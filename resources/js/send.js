if ('serviceWorker' in navigator && 'PushManager' in window) {
    navigator.serviceWorker.register('/service-worker.js')
    .then(function(swReg) {
      console.log('Service Worker is registered', swReg);
      askPermission().then(function() {
        subscribeUser(swReg);
      });
    })
    .catch(function(error) {
      console.error('Service Worker Error', error);
    });
  } else {
    console.warn('Push messaging is not supported');
  }
  
  function askPermission() {
    return new Promise(function(resolve, reject) {
      const permissionResult = Notification.requestPermission(function(result) {
        resolve(result);
      });
  
      if (permissionResult) {
        permissionResult.then(resolve, reject);
      }
    }).then(function(permissionResult) {
      if (permissionResult !== 'granted') {
        throw new Error('We weren\'t granted permission.');
      }
    });
  }
  
  function subscribeUser(swReg) {
    const applicationServerKey = urlB64ToUint8Array('YOUR_PUBLIC_VAPID_KEY');
    swReg.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: applicationServerKey
    })
    .then(function(subscription) {
      console.log('User is subscribed:', subscription);
      // Enviar a subscrição para o seu servidor Laravel
      axios.post('/api/save-subscription', subscription)
        .then(response => {
          console.log('Subscription saved:', response);
        })
        .catch(error => {
          console.error('Error saving subscription:', error);
        });
    })
    .catch(function(err) {
      console.log('Failed to subscribe the user: ', err);
    });
  }
  
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