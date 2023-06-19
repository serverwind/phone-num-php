const RESULT = document.getElementById("result");
const SUBMIT = document.getElementById('submit');
const PHONE_NUM = document.getElementById('phoneNumber');
const COUNTRY = document.getElementById('country');
const STATUS = document.getElementById('status');
const WRONG_NUM = /[0-9+]+/;

function checkNum() {
  const INPUT = document.getElementById('phone').value;

  if (INPUT.match(WRONG_NUM)) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'validation.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let response = JSON.parse(xhr.responseText);
          if (response.phoneNum == undefined) {
            STATUS.innerHTML = 'Ошибка. Проверьте введенный номер.';
            PHONE_NUM.innerHTML = '';
            COUNTRY.innerHTML = '';
          } else {
            STATUS.innerHTML = 'Успешно!'
            PHONE_NUM.innerHTML = `Номер телефона: ${response.phoneNum}`;
            COUNTRY.innerHTML = `Страна: ${response.country}`;
          }
      } else {
        console.log('Error');
        }
      }
    }
    xhr.send('value=' + encodeURIComponent(INPUT));
  } else {
    STATUS.innerHTML = 'Ошибка. Проверьте введенный номер.'
  }
}

SUBMIT.addEventListener('click', checkNum);
