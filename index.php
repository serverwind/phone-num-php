<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Phone number validating</title>
</head>
<body>
  <h1>Проверка номера телефона</h1>

  <label for="phone">Введите номер телефона:</label><br>
  <input type="text" id="phone" name="phone" required><br>
  <input type="submit" id='submit' value="Проверить">

  <div id="result">
    <h2>Результат: <span id='status'></span></h2>
    <p id="phoneNumber"></p>
    <p id="country"></p>
  </div>

<script src='main.js'></script>
</body>
</html>
