# CADASTRO DE ASSOCIADO - UNISEN SISTEMA

## FLUXO DE REGISTRO PARA ASSOCIADO

1) TELA LOGIN, CLICAR NO BOTAO [Criar uma Conta].

2) REALIZAR PRÉ CADASTRO NA TELA /register/index.php, com os dados:

- nome completo.
- CRM UF -> verifica se já cadastro no sistema.
- email  -> verifica se já existe no sistema.
- CPF -> testa se é válido e verifica se já existe no sistema.
- senha e confirmação da senha -> verifica se a duas são iguais.

3)O Cadastrante RECEBE UM EMAIL PARA CONFIRMAR, na tabela tbl_cadastrantes, já é cadastrado essas pré informações, com o campo STATUS: novo, após confirmação, no email do cadastrantes, clicando a tbl_cadastrantes, atualiza o STATUS para confirmado, e continua o cadastro do associado cadastrante, com os ademais campos pertinentes ao cadastro, e upload de toda documentação necessária para verificação do cadastro e criação de seu contrato junto a empresa.


### ETAPAS DO CADASTRO DE NOVO ASSOCIADO: tipos de STATUS.

- novo -> dados iniciais, verificando, CRM, CPF, email, criando senhas de acesso e recebendo email para confirmação do pré-registro

- confirmado: após confirmação do pré-registro do email, habilitando o cadastrante a preencher completamente os dados necessários e upload da documentação completa para o cadastro.


- cadastrando: processo de inserção de dados, registro completo ou minimo parcial, e uploads da documentação mínima para a verificação do mesmo e homologação do cadastro de associado no sistema.


- em verificação: processo interno administrativo do sistema para verificar documentos e dados registrados pelo o usuario associado cadastrante.



O QUE PRECISA...


De um esquema o cadastrante na tela de login oficial do sistema, se o cadastrante logar com CPF.

LOGIN DO PRE-CADASTRANTE no /login/index.php INSERIR REDIRECIONAMENTO APOS verificacao do login, e do tipo de usuario


CRIAÇÃO DA TABELA tipo de usuario no sistema,

- admin
- cadastrante
- associado


#### VOLTANDO NA PARTE DO CADASTRO

1. USER IMAGE, imagem ou avatar do pre-cadastrante no sistema.


Pauta da reunião..

- CRM Ja inserido com UF
- definir tipos de usuario
- definir filiação se não existe pai na certidão (campo fica em branco)
- definir as tabelas de cadastrantes, COM NOVO CAMPOS