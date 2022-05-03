<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
    />
    <link rel="stylesheet" href="css/styleSocial.css">
    <title>Fab</title>
  </head>
  <body>
    <div class="fabs" onclick="toggleBtn()">
      <div class="action">
        <i class="fas fa-plus" id="add"></i>
        <i class="fas fa-times" id="remove" style="display: none"></i>
      </div>

      <div class="btns">
        <a href="#" class="btn" style="background: #3b5999"
          ><i class="fab fa-facebook-f"></i
        ></a>
        <a href="#" class="btn" style="background: #55acee"
          ><i class="fab fa-twitter"></i
        ></a>
        <a href="#" class="btn" style="background: #25D366"
          ><i class="fab fa-whatsapp"></i
        ></a>
        <a href="#" class="btn" style="background:#e4405f"
          ><i class="fab fa-instagram"></i
        ></a>
      </div>
    </div>
  </body>
  <script>
    function toggleBtn() {
      const Btns = document.querySelector(".btns");
      const add = document.getElementById("add");
      const remove = document.getElementById("remove");
      const btn = document.querySelector(".btns").querySelectorAll("a");
      Btns.classList.toggle("open");
      if (Btns.classList.contains("open")) {
        remove.style.display = "block";
        add.style.display = "none";
        btn.forEach((e, i) => {
          setTimeout(() => {
            bottom = 40 * i;
            e.style.bottom = bottom + "px";
            console.log(e);
          }, 100 * i);
        });
      } else {
        add.style.display = "block";
        remove.style.display = "none";
        btn.forEach((e, i) => {
          e.style.bottom = "0px";
        });
      }
    }
  </script>
</html>
