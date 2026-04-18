<template>
  <div class="bg-light">
    <HeaderPrincipal @search="filtrar" />

    <main class="content-grid">
      <div class="action-bar">
        <span class="results-text"
          >{{ produtosFiltrados.length }} resultados</span
        >
        <router-link to="/produtos/novo" class="btn-new">
          Cadastrar PRODUTO
        </router-link>
      </div>

      <div class="grid-container">
        <div
          v-for="produto in produtosFiltrados"
          :key="produto.id"
          class="product-card"
        >
          <div
            class="image-box"
            :style="{ backgroundImage: 'url(' + getImg(produto.imagem) + ')' }"
          ></div>

          <div class="info-box">
            <h3 class="title">{{ produto.nome }}</h3>
            <div class="price">
              <span class="symbol">R$</span>
              <span class="value">{{ formatPrice(produto.preco) }}</span>
            </div>
            <p class="shipping">Saber Mais</p>

            <div class="card-actions">
              <button @click="editar(produto.id)" class="btn-icon blue">
                <i class="material-icons">edit</i>
              </button>
              <button @click="confirmar(produto.id)" class="btn-icon red">
                <i class="material-icons">delete_outline</i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import api from "../services/api";
import HeaderPrincipal from "../components/HeaderPrincipal.vue";

export default {
  components: { HeaderPrincipal },
  data() {
    return { produtos: [], busca: "" };
  },
  computed: {
    produtosFiltrados() {
      return this.produtos.filter((p) =>
        p.nome.toLowerCase().includes(this.busca.toLowerCase()),
      );
    },
  },
  mounted() {
    this.carregar();
  },
  methods: {
    async carregar() {
      const res = await api.get("/produtos");
      this.produtos = res.data;
    },
    filtrar(v) {
      this.busca = v;
    },
    formatPrice(v) {
      return parseFloat(v).toLocaleString("pt-BR", {
        minimumFractionDigits: 2,
      });
    },
    getImg(img) {
      return img
        ? `http://localhost:8000/storage/${img}`
        : "https://via.placeholder.com/300";
    },
    editar(id) {
      this.$router.push(`/produtos/edit/${id}`);
    },
    async confirmar(id) {
      if (confirm("Excluir?")) {
        await api.delete(`/produtos/${id}`);
        this.carregar();
      }
    },
  },
};
</script>

<style scoped>
.bg-light {
  background-color: #f5f5f5;
  min-height: 100vh;
}
.content-grid {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.action-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
.btn-new {
  background: #3483fa;
  color: white;
  padding: 10px 20px;
  border-radius: 4px;
  text-decoration: none;
  font-weight: bold;
  font-size: 14px;
}

/* Grid System: 3 colunas Desktop */
.grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.product-card {
  background: white;
  border-radius: 8px;
  overflow: hidden;
  transition: 0.3s;
  border-bottom: 1px solid #eee;
}
.product-card:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.image-box {
  height: 250px;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  border-bottom: 1px solid #f5f5f5;
  margin: 10px;
}

.info-box {
  padding: 15px;
  border-top: 1px solid #f5f5f5;
}
.title {
  font-size: 14px;
  color: #333;
  font-weight: 400;
  margin: 0 0 10px 0;
  height: 35px;
  overflow: hidden;
}
.price {
  color: #333;
  margin-bottom: 5px;
}
.symbol {
  font-size: 14px;
  margin-right: 2px;
}
.value {
  font-size: 24px;
  font-weight: 500;
}
.shipping {
  color: #00a650;
  font-size: 13px;
  font-weight: bold;
  margin: 0;
}

.card-actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 15px;
}
.btn-icon {
  background: none;
  border: none;
  cursor: pointer;
}
.btn-icon.blue {
  color: #3483fa;
}
.btn-icon.red {
  color: #ff4081;
}

/* Responsividade */
@media (max-width: 1024px) {
  .grid-container {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 600px) {
  .grid-container {
    grid-template-columns: 1fr;
  }
  .image-box {
    height: 200px;
  }
}
</style>
