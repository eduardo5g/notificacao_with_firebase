  navigator.serviceWorker.register('https://pecsis.com.br/public/build/assets/service-worker-jTyMzL9D.js').
then(function(registration) {
  registration.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: urlB64ToUint8Array( 'BIwQCD14DEGXlrfTUC0AVyMATeR9y6nZs_3Dm3muc9r4mFToylEA61cFCxxF3TuMbkX4jGXkSw8OhEbUjnYVkN0' )
  }).then(function(subscription) {
      fetch('https://pecsis.com.br/public/subscribe', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(subscription)
      });
  });
});

function urlB64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}


// if ('serviceWorker' in navigator && 'PushManager' in window) {
//     navigator.serviceWorker.register('https://localhost/public/build/assets/service-worker-DWngUeXW.js')
//     .then(function(swReg) {
//       console.log('Service Worker is registered', swReg);
//       askPermission().then(function() {
//         subscribeUser(swReg);
//       });
//     })
//     .catch(function(error) {
//       console.error('Service Worker Error', error);
//     });
//   } else {
//     console.warn('Push messaging is not supported');
//   }
  
//   function askPermission() {
//     return new Promise(function(resolve, reject) {
//       const permissionResult = Notification.requestPermission(function(result) {
//         resolve(result);
//       });
  
//       if (permissionResult) {
//         console.log('Permission result: ', permissionResult);
//         permissionResult.then(resolve, reject);
//       }
//     }).then(function(permissionResult) {
//       if (permissionResult !== 'granted') {
//         throw new Error('We weren\'t granted permission.');
//       }
//     });
//   }
  
//   function subscribeUser(swReg) {
//     console.log('subscribeUser', swReg);
//     const applicationServerKey = urlB64ToUint8Array('UeeXa3EuOg3nTOopmCjlTfcsdbItthRgrnpyAA22tBo');
//     swReg.pushManager.subscribe({
//       userVisibleOnly: true,
//       applicationServerKey: applicationServerKey
//     })
//     .then(function(subscription) {
//       console.log('User is subscribed:', subscription);
//       // Enviar a subscrição para o seu servidor Laravel
//       axios.post('/subscribe', subscription)
//         .then(response => {
//           console.log('Subscription saved:', response);
//         })
//         .catch(error => {
//           console.error('Error saving subscription:', error);
//         });
//     })
//     .catch(function(err) {
//       console.log('Failed to subscribe the user: ', err);
//     });
//   }
  