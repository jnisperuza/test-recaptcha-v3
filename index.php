<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="language" content="es" />
    <title>Test Google reCapcha V3</title>
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="main.js"></script>
  </head>
  <body>
    <section class="credentials">
      <fieldset>
        <legend>Credentials</legend>
        <label for="site-key" class="required">
          <span>Site Key:</span>
          <input
            type="text"
            name="site-key"
            id="site-key"
            onchange="loadRecaptchaLibrary()"
          />
        </label>
        <label for="secret-key" class="required">
          <span>Secret Key:</span>
          <input type="text" name="secret-key" id="secret-key" />
        </label>
        <label for="remote-ip">
          <span>Remote IP:</span>
          <input
            type="text"
            name="remote-ip"
            id="remote-ip"
            value="localhost"
          />
        </label>
      </fieldset>
      <aside>
        <button onclick="reload()">Genarate token</button>
        <button onclick="verify()">Site verify</button>
        <button onclick="location.reload()">Reset</button>
      </aside>
    </section>
    <section class="response">
      <fieldset>
        <legend>Recaptcha response</legend>
        <textarea
          name="g-recaptcha-response"
          id="g-recaptcha-response"
          readonly
        ></textarea>
      </fieldset>
      <button class="copy" onclick="copyToClipboard('g-recaptcha-response')">
        Copy
      </button>
    </section>
    <section class="response">
      <fieldset>
        <legend>Site Verify Response</legend>
        <textarea
          name="site-verify-response"
          id="site-verify-response"
          readonly
        ></textarea>
      </fieldset>
      <button class="copy" onclick="copyToClipboard('site-verify-response')">
        Copy
      </button>
    </section>
    <p class="credits">By Jeison Nisperuza</p>
  </body>
</html>
