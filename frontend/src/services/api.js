import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:8000/api",
  timeout: 10000, // 10 segundos para evitar requisições infinitas
});

/**
 * Interceptor de Requisição
 */
api.interceptors.request.use(
  (config) => {
    // Se enviarmos FormData (imagens), removemos o Content-Type para o
    // navegador definir o 'multipart/form-data; boundary=...' automaticamente.
    if (config.data instanceof FormData) {
      delete config.headers["Content-Type"];
    } else {
      config.headers["Content-Type"] = "application/json";
    }

    config.headers["Accept"] = "application/json";
    return config;
  },
  (error) => {
    return Promise.reject(error);
  },
);

/**
 * Interceptor de Resposta (Foco em UX)
 */
api.interceptors.response.use(
  (response) => response,
  (error) => {
    // Centralização de mensagens de erro para o usuário
    if (!error.response) {
      console.error("⚠️ Erro de Rede: Verifique se o Laravel está rodando.");
    } else {
      const status = error.response.status;
      if (status === 401) {
        console.warn("🚫 Não autorizado. Redirecionando para login...");
        // window.location.href = '/login';
      }
      if (status === 422) {
        console.error("❌ Erro de Validação:", error.response.data.errors);
      }
    }
    return Promise.reject(error);
  },
);

export default api;
