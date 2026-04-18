<template>
  <header class="header-full">
    <div class="header-container">
      <div class="logo-box" @click="$router.push('/')">
        <div class="logo-circle">
          <img src="./../assets/logo.avif" alt="Logo Meu Catalogo" class="logo-img" />
        </div>

        <h1 class="logo-text">Meu<span>Catálogo</span></h1>
      </div>

      <div class="search-box">
        <input
          type="text"
          placeholder="Buscar produtos, marcas e muito mais..."
          @input="$emit('search', $event.target.value)"
        />
        <button class="search-btn">
          <i class="material-icons">search</i>
        </button>
      </div>

      <div class="user-menu">
        <span class="user-name">Douglas</span>
      </div>
    </div>
  </header>
</template>

<style scoped>
.header-full {
  background-color: #fff159;
  width: 100%;
  padding: 42px 0;
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

.header-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
  gap: 20px;
}

.logo-text {
  font-size: 22px;
  font-weight: 800;
  margin: 0;
  cursor: pointer;
  color: #333;
}
.logo-text span {
  color: #3483fa;
}
.logo-box {
  display: flex;
  align-items: center;
  cursor: pointer;
  gap: 12px; /* Espaço entre o círculo e o texto */
}

/* O Círculo */
.logo-circle {
  width: 45px;
  height: 45px;
  background-color: #fff; /* Fundo branco caso a imagem seja transparente */
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden; /* Garante que a imagem não saia do círculo */
  border: 2px solid rgba(255, 255, 255, 0.3); /* Um detalhe sutil de borda */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* A Imagem dentro do círculo */
.logo-img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Faz a imagem preencher o círculo sem esticar */
}

.logo-text {
  font-size: 22px;
  font-weight: 700;
  color: #333;
  margin: 0;
  line-height: 1;
}

.logo-text span {
  color: #3483fa; /* Azul padrão learnTECH */
}

/* Ajuste para telas menores */
@media (max-width: 480px) {
  .logo-circle {
    width: 35px;
    height: 35px;
  }
  .logo-text {
    font-size: 18px;
  }
}

.search-box {
  flex-grow: 1;
  max-width: 600px;
  background: #fff;
  display: flex;
  border-radius: 2px;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
  height: 40px;
}

.search-box input {
  border: none;
  padding: 0 15px;
  width: 100%;
  outline: none;
  font-size: 16px;
}

.search-btn {
  background: none;
  border: none;
  border-left: 1px solid #eee;
  padding: 0 10px;
  color: #666;
  cursor: pointer;
}

.user-menu {
  display: flex;
  align-items: center;
  gap: 15px;
  color: #333;
}
.user-name {
  font-size: 14px;
  font-weight: 500;
}

@media (max-width: 768px) {
  .user-menu {
    display: none;
  }
}
</style>
