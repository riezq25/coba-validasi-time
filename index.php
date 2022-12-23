<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
  <div class="row p-4">
    <div class="col-sm-12 col-md-8">
      <div class="mb-3">
        <form class="row g-3">
          <table>
            <tbody>
              <?php $days = 7;
              for ($i = 0; $i < 7; $i++) : ?>
                <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="status[<?= $i ?>]" />
                      <label class="form-check-label" for="flexCheckDefault">
                        Aktif
                      </label>
                    </div>
                  </td>
                  <td>
                    <input type="time" class="form-control" disabled name="masuk[<?= $i ?>]" />
                    <div class="invalid-feedback">
                    </div>
                  </td>
                  <td>
                    <input type="time" class="form-control" disabled name="pulang[<?= $i ?>]" />
                    <div class="invalid-feedback">
                    </div>
                  </td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $(".form-check-input").click(function() {
        let inputTimes = $(this)
          .parent()
          .parent()
          .parent()
          .find("input[type='time']");

        let masuk = inputTimes[0];
        let pulang = inputTimes[1];

        if ($(this).is(":checked")) {
          inputTimes.removeAttr("disabled");
          masuk.value = "08:00";
          pulang.value = "16:00";
        } else {
          inputTimes.attr("disabled", "disabled");
          inputTimes.val("");
        }
      });

      // pulang onchange
      $("input[type='time']").change(function() {
        let inputTimes = $(this).parent().parent().find("input[type='time']")
        let masuk = inputTimes[0];
        let pulang = inputTimes[1];

        let invalidFeedback = $(this).next();

        $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");
        invalidFeedback.text("");

        if (masuk.value > pulang.value) {
          $(this).addClass("is-invalid");
          invalidFeedback.text("Jam pulang harus lebih besar dari jam masuk");
          pulang.value = masuk.value;
        }
      });
    });
  </script>
</body>

</html>