#Gamestore

Este projeto consiste numa loja online para venda de jogos novos e usados, desenvolvida em PHP com arquitetura MVC. O sistema foi criado para oferecer uma experiência de compra intuitiva e eficiente, onde os utilizadores registados podem navegar ao longo das diversas gamas de jogos, desde os mais recentes até aos usados a preços competitivos. Utilizando o modelo MVC, o projeto apresenta um design modular, facilitando tanto a organização do código como futuras expansões ou manutenção.

A funcionalidade principal centra-se na navegação pelos produtos, na possibilidade de adicionar ao carrinho de compras e na verificação de detalhes de envio antes da finalização. A gestão de stock está integrada, isto é, os produtos esgotados têm o botão de compra automaticamente desativado, aparecendo a indicação de 'Esgotado' para que o utilizador saiba que o item não está disponível.

No perfil do utilizador, foi implementado um sistema de edição onde é possível atualizar informações pessoais, como o nome, morada, data de nascimento, email e a palavra-passe. Para segurança, a alteração da palavra-passe exige a inserção da senha atual, assegurando que apenas o proprietário da conta possa efetuar essa atualização.

As tecnologias utilizadas incluem PHP para a lógica de servidor, HTML, JavaScript para a interface do utilizador e SQL para a gestão de dados. A comunicação assíncrona com AJAX permite que algumas atualizações de dados, como a edição de perfil, ocorram sem recarregar a página, tornando o uso mais fluido e rápido. A gestão de sessões permite uma navegação segura e personalizada e as encomendas efetuadas ficam disponíveis no perfil, permitindo ao utilizador consultar o histórico de compras.

Este projeto visa a criação de uma plataforma de vendas robusta e escalável, com foco em usabilidade e segurança.
