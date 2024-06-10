self.addEventListener('push', function(event) {
  console.log(event.data);
  const data = event.data.json();
  self.registration.showNotification(data.title, {
      body: data.body,
      icon: data.icon,
      data: {
          url: data.url
      }
  });
});

self.addEventListener('notificationclick', function(event) {
  event.notification.close();
  event.waitUntil(
      clients.openWindow(event.notification.data.url)
  );
});