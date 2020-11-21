<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
      html {
        width: 100%;
        height: 100%;
      }

      body {
        background: linear-gradient(
          45deg,
          rgba(66, 183, 245, 0.8) 0%,
          rgba(66, 245, 189, 0.4) 100%
        );
        color: rgba(0, 0, 0, 0.6);
        font-family: "Roboto", sans-serif;
        font-size: 14px;
        line-height: 1.6em;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

      .overlay,
      .form-panel.one:before {
        position: absolute;
        top: 0;
        left: 0;
        display: none;
        background: rgba(0, 0, 0, 0.8);
        width: 100%;
        height: 100%;
      }

      .form {
        z-index: 15;
        position: relative;
        background: #ffffff;
        width: 600px;
        border-radius: 4px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        margin: 100px auto 10px;
        overflow: hidden;
      }
      .form-toggle {
        z-index: 10;
        position: absolute;
        top: 60px;
        right: 60px;
        background: #ffffff;
        width: 60px;
        height: 60px;
        border-radius: 100%;
        transform-origin: center;
        transform: translate(0, -25%) scale(0);
        opacity: 0;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      .form-toggle:before,
      .form-toggle:after {
        content: "";
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 30px;
        height: 4px;
        background: #4285f4;
        transform: translate(-50%, -50%);
      }
      .form-toggle:before {
        transform: translate(-50%, -50%) rotate(45deg);
      }
      .form-toggle:after {
        transform: translate(-50%, -50%) rotate(-45deg);
      }
      .form-toggle.visible {
        transform: translate(0, -25%) scale(1);
        opacity: 1;
      }
      .form-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 0 0 20px;
      }
      .form-group:last-child {
        margin: 0;
      }
      .form-group label {
        display: block;
        margin: 0 0 10px;
        color: rgba(0, 0, 0, 0.6);
        font-size: 12px;
        font-weight: 500;
        line-height: 1;
        text-transform: uppercase;
        letter-spacing: 0.2em;
      }
      .two .form-group label {
        color: #ffffff;
      }
      .form-group input {
        outline: none;
        display: block;
        background: rgba(0, 0, 0, 0.1);
        width: 100%;
        border: 0;
        border-radius: 4px;
        box-sizing: border-box;
        padding: 12px 20px;
        color: rgba(0, 0, 0, 0.6);
        font-family: inherit;
        font-size: inherit;
        font-weight: 500;
        line-height: inherit;
        transition: 0.3s ease;
      }
      .form-group input:focus {
        color: rgba(0, 0, 0, 0.8);
      }
      .two .form-group input {
        color: #ffffff;
      }
      .two .form-group input:focus {
        color: #ffffff;
      }
      .form-group button {
        outline: none;
        background: #4285f4;
        width: 100%;
        border: 0;
        border-radius: 4px;
        padding: 12px 20px;
        color: #ffffff;
        font-family: inherit;
        font-size: inherit;
        font-weight: 500;
        line-height: inherit;
        text-transform: uppercase;
        cursor: pointer;
      }
      .two .form-group button {
        background: #ffffff;
        color: #4285f4;
      }
      .form-group .form-remember {
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 0;
        text-transform: none;
      }
      .form-group .form-remember input[type="checkbox"] {
        display: inline-block;
        width: auto;
        margin: 0 10px 0 0;
      }
      .form-group .form-recovery {
        color: #4285f4;
        font-size: 12px;
        text-decoration: none;
      }
      .form-panel {
        padding: 60px calc(5% + 60px) 60px 60px;
        box-sizing: border-box;
      }
      .form-panel.one:before {
        content: "";
        display: block;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s ease;
      }
      .form-panel.one.hidden:before {
        display: block;
        opacity: 1;
        visibility: visible;
      }
      .form-panel.two {
        z-index: 5;
        position: absolute;
        top: 0;
        left: 95%;
        background: #4285f4;
        width: 100%;
        min-height: 100%;
        padding: 60px calc(10% + 60px) 60px 60px;
        transition: 0.3s ease;
        cursor: pointer;
      }
      .form-panel.two:before,
      .form-panel.two:after {
        content: "";
        display: block;
        position: absolute;
        top: 60px;
        left: 1.5%;
        background: rgba(255, 255, 255, 0.2);
        height: 30px;
        width: 2px;
        transition: 0.3s ease;
      }
      .form-panel.two:after {
        left: 3%;
      }
      .form-panel.two:hover {
        left: 93%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }
      .form-panel.two:hover:before,
      .form-panel.two:hover:after {
        opacity: 0;
      }
      .form-panel.two.active {
        left: 10%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        cursor: default;
      }
      .form-panel.two.active:before,
      .form-panel.two.active:after {
        opacity: 0;
      }
      .form-header {
        margin: 0 0 40px;
      }
      .form-header h1 {
        padding: 4px 0;
        color: #4285f4;
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
      }
      .two .form-header h1 {
        position: relative;
        z-index: 40;
        color: #ffffff;
      }
      .pen-footer {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 600px;
        margin: 20px auto 100px;
      }
      .pen-footer a {
        color: #ffffff;
        font-size: 12px;
        text-decoration: none;
        text-shadow: 1px 2px 0 rgba(0, 0, 0, 0.1);
      }
      .pen-footer a .material-icons {
        width: 12px;
        margin: 0 5px;
        vertical-align: middle;
        font-size: 12px;
      }

      .cp-fab {
        background: #ffffff !important;
        color: #4285f4 !important;
      }
    </style>

    
  </head>
  <body>
    <div class="form">
      <div class="form-toggle"></div>
      <div class="form-panel one">
        <div class="form-header">
          <h1>Account Login</h1>
        </div>
        <div class="form-content">
          <form>
            <div class="form-group">
              <label for="username">Username</label
              ><input
                type="text"
                id="username"
                name="username"
                required="required"
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label
              ><input
                type="password"
                id="password"
                name="password"
                required="required"
              />
            </div>
            <div class="form-group">
              <label class="form-remember"
                ><input type="checkbox" />Remember Me</label
              ><a class="form-recovery" href="#">Forgot Password?</a>
            </div>
            <div class="form-group"><button type="submit">Log In</button></div>
          </form>
        </div>
      </div>
      <div class="form-panel two">
        <div class="form-header">
          <h1>Register Account</h1>
        </div>
        <div class="form-content">
          <form>
            <div class="form-group">
              <label for="username">Username</label
              ><input
                type="text"
                id="username"
                name="username"
                required="required"
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label
              ><input
                type="password"
                id="password"
                name="password"
                required="required"
              />
            </div>
            <div class="form-group">
              <label for="cpassword">Confirm Password</label
              ><input
                type="password"
                id="cpassword"
                name="cpassword"
                required="required"
              />
            </div>
            <div class="form-group">
              <label for="email">Email Address</label
              ><input
                type="email"
                id="email"
                name="email"
                required="required"
              />
            </div>
            <div class="form-group">
              <button type="submit">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="pen-footer">
      <a
        href="https://www.behance.net/gallery/30478397/Login-Form-UI-Library"
        target="_blank"
        ><i class="material-icons">arrow_backward</i>View on Behance</a
      ><a
        href="https://github.com/andyhqtran/UI-Library/tree/master/Login%20Form"
        target="_blank"
        >View on Github<i class="material-icons">arrow_forward</i></a
      >
    </div>

    <script src="jquery.js"></script>
    <script>
      $(document).ready(function () {
        var panelOne = $(".form-panel.two").height(),
          panelTwo = $(".form-panel.two")[0].scrollHeight;

        $(".form-panel.two")
          .not(".form-panel.two.active")
          .on("click", function (e) {
            e.preventDefault();

            $(".form-toggle").addClass("visible");
            $(".form-panel.one").addClass("hidden");
            $(".form-panel.two").addClass("active");
            $(".form").animate(
              {
                height: panelTwo,
              },
              200
            );
          });

        $(".form-toggle").on("click", function (e) {
          e.preventDefault();
          $(this).removeClass("visible");
          $(".form-panel.one").removeClass("hidden");
          $(".form-panel.two").removeClass("active");
          $(".form").animate(
            {
              height: panelOne,
            },
            200
          );
        });
      });
    </script>
    <!-- <script src="script.js" async defer></script> -->
    <!-- <script src="../../jquery.js"" async defer></script> -->
  </body>
</html>