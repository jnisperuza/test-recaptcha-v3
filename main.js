document.addEventListener("DOMContentLoaded", function () {
  loadRecaptchaLibrary();
});

var loadRecaptchaLibrary = function () {
  var head = document.getElementsByTagName("head")[0];
  var scripts = Array.from(
    document.querySelectorAll(
      'script[src^="https://www.google.com/"], script[src^="https://www.gstatic.com/recaptcha/"]'
    )
  );

  scripts.forEach(function (script) {
    head.removeChild(script);
  });

  window.siteKey = document.getElementById("site-key").value;
  if (window.siteKey) {
    $("head").append(
      $("<script />").attr(
        "src",
        "https://www.google.com/recaptcha/api.js?render=".concat(window.siteKey)
      )
    );
  }
};

var reload = function () {
  try {
    if (grecaptcha && window.siteKey) {
      grecaptcha
        .execute(window.siteKey, {
          action: "homepage",
        })
        .then(
          function (token) {
            document.getElementById("g-recaptcha-response").value = token;
          },
          function (error) {
            alert("reCaptcha was not initialized correctly");
          }
        );
    }
  } catch (Error) {
    alert("Enter the site key");
  }
};

var verify = function () {
  var token = document.getElementById("g-recaptcha-response").value;
  var secretKey = document.getElementById("secret-key").value;
  var remoteIp = document.getElementById("remote-ip").value;

  if (!token) {
    alert("You must first get the token");
  } else if (!secretKey) {
    alert("Enter the secret key");
  }

  if (token && secretKey && remoteIp) {
    $.post("verify.php", { token, secretKey, remoteIp }, function (data) {
      document.getElementById("site-verify-response").value = JSON.stringify(
        data,
        undefined,
        4
      );
    });
  }
};

var copyToClipboard = function (id) {
  const textArea = document.getElementById(id);
  textArea.select();
  document.execCommand("copy");
};
