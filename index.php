<!DOCTYPE html>
<html>
<head>
  <title>EcoTrack - Gerenciamento de Resíduos Sólidos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>EcoTrack</h1>
    <nav>
      <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="cadastro.php">Cadastro</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero">
    <div class="container">
      <div class="destaque-content">
        <h3 class="titulo-destaque animate-text-direita">EcoTrack: A Solução Inteligente para a Gestão de Resíduos</h3>
        <p class="descricao-destaque animate-text-direita">Cansado do problema do lixo na sua empresa? O EcoTrack transforma a maneira como você lida com o descarte de resíduos, seja qual for o tamanho do seu negócio. Com um sistema digital de monitoramento, você acompanha tudo de perto e garante o destino certo para cada tipo de resíduo.</p>
        <p class="descricao-destaque animate-text-direita">Mas tem mais! O EcoTrack conecta você diretamente com recicladoras interessadas nos resíduos que sua empresa gera, simplificando o processo de descarte e promovendo a economia circular.</p>
        <p class="descricao-destaque animate-text-direita">Com o EcoTrack você:</p>
        <ul class="lista-destaque animate-text-direita">
          <li><strong>Simplifica</strong> o descarte e garante destinos adequados para cada tipo de resíduo.</li>
          <li><strong>Reduz custos</strong> com o descarte inadequado e potencializa a economia circular.</li>
          <li><strong>Fortalece</strong> a imagem da sua empresa como social e ambientalmente responsável.</li>
        </ul>
        <p class="descricao-destaque animate-text-direita">Gerencie seus resíduos de forma rápida, eficiente e sustentável. Experimente o EcoTrack!</p>
      </div>
      <div class="destaque-image">
        <img src="39479adb93c6d9f892449c8698d20850.png" alt="Imagem de Destaque" class="slide-in-right">
      </div>
    </div>
  </section>

  <main>
    <section class="hero" style="background-color: #795548;" > 
        <div class="hero-content" style="font-size: 9px">
            <h2 >Gerencie seus Resíduos <br> de Forma Sustentável</h2>
            <p>Contatos:</p>
            <p>
              <span class="contato-label">E-mail:</span> 
              <a>email@email.com</a> 
            </p>
            <p>
              <span class="contato-label">Telefone:</span> 
              <a>+55 11 99999-9999</a> 
            </p>
            <p>
              <span class="contato-label">Endereço:</span> 
              <a>Av. Flores 1999</a> 
            </p>
            <p>Junte-se ao EcoTrack e faça a diferença no planeta.</p>
            <div class="contatos">
        </div>
    </section>
</main>

  <footer>
    <p>© 2023 EcoTrack</p>
  </footer>
  <script> document.addEventListener('DOMContentLoaded', function() {
  const elementosAnimados = document.querySelectorAll('.animate-text-direita'); 

  function verificarScroll() {
    elementosAnimados.forEach(function(elemento) {
      const posicaoElemento = elemento.getBoundingClientRect().top;
      const alturaJanela = window.innerHeight; 

      if (posicaoElemento < alturaJanela * 0.8) { 
        elemento.classList.add('active');
      } else {
        elemento.classList.remove('active');
      }
    });
  }

  window.addEventListener('scroll', verificarScroll);
  verificarScroll(); 
});</script>
</body>
</html>