<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/contacts/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/contacts/thanks.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Contact Form
      </a>
    </div>
  </header>

  <main>
    <div class="thanks__content">
      <div class="thanks__heading">
        <h2>お問い合わせありがとうございました
        </h2>
        <a  href="{{ route('contacts.index') }}">HOME</a>
      </div>
    </div>
  </main>

</html>
