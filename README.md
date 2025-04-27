# MOZSMSAPI
Este é  um script PHP criadp por me é utilizado para enviar mensagens SMS para um ou vários números de telefone através da API do serviço Mozesms.
Funcionalidade

O script realiza os seguintes passos:

    Define os números de telefone que irão receber as mensagens.

    Monta os dados da mensagem num formato JSON.

    Envia o JSON para a API do Mozesms usando uma solicitação HTTP POST.

    Trata erros de comunicação e resposta da API.

Como utilizar

    Configurar números de telefone
    Substitui as variáveis $tell1 e $tell12 pelos números de telefone que deves contactar (incluindo o indicativo internacional).

    Definir o remetente (Sender ID)
    Altera o valor de 'sender' para o nome ou identificador que pretendes que o destinatário veja como remetente da mensagem.

    Editar o conteúdo das mensagens
    Modifica os textos associados a cada número no array "messages".

    Configurar a API e o Token

        API_URL: Endereço da API para envio de mensagens.

        AUTH_TOKEN: Token de autorização fornecido pelo serviço Mozesms. Substitui pelo teu próprio token.

    Executar o script
    Após configurado, basta executar o ficheiro PHP. O script irá enviar as mensagens e apresentar a resposta ou um erro caso aconteça.

Estrutura Principal

    $messages: Estrutura do envio, contendo o Sender ID e as mensagens para cada número.

    sendSms($messages_json): Função que envia o pedido HTTP POST para a API.

    Tratamento de erros: Caso a comunicação falhe ou o código de resposta HTTP seja diferente de 200, será apresentada uma mensagem de erro.

Requisitos

    PHP 7.0 ou superior.

    Extensão cURL ativa.

Nota

    Certifica-te de que o token de autorização está correcto.

    Em ambiente de produção, deves validar os números e mensagens antes do envio.
