import { createRouter, createWebHistory } from "vue-router";

// Usamos Lazy Loading para melhorar a performance de carregamento inicial
const ListaProdutos = () => import("../views/ListaProdutos.vue");
const FormProduto = () => import("../views/FormProduto.vue");

const routes = [
  {
    path: "/",
    name: "Home",
    component: ListaProdutos,
    meta: { title: "Vitrine" },
  },
  {
    path: "/produtos/novo",
    name: "NovoProduto",
    component: FormProduto,
    meta: { title: "Cadastrar Produto - learnTECH" },
  },
  {
    // A rota de edição usa o parâmetro :id dinâmico
    path: "/produtos/edit/:id",
    name: "EditarProduto",
    component: FormProduto,
    props: true, // Permite passar o ID como prop para o componente
    meta: { title: "Editar Produto - learnTECH" },
  },
  {
    // Rota de fallback para 404 (opcional, mas recomendado para UX)
    path: "/:pathMatch(.*)*",
    redirect: "/",
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  // Garante que a página sempre comece no topo ao trocar de rota
  scrollBehavior() {
    return { top: 0 };
  },
});

// Ajusta o título da aba do navegador conforme a rota
router.beforeEach((to, from, next) => {
  document.title = to.meta.title || "learnTECH";
  next();
});

export default router;
