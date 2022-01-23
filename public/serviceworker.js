var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/index.php',
    '/css/app.css', 
    '/js/app.js',
    '/plugins/fontawesome-free/css/all.min.css',
    '/plugins/toastr/toastr.min.css',
    '/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    '/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
    '/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
    '/css/icons.css',
    '/jquery-ui/jquery-ui.css',
    '/plugins/bootstrap/js/bootstrap.bundle.min.js',
    '/dist/js/adminlte.min.js',
    '/plugins/sweetalert2/sweetalert2.min.js',
    '/plugins/datatables/jquery.dataTables.min.js',
    '/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    '/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    '/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    '/plugins/datatables-buttons/js/dataTables.buttons.min.js',
    '/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
    '/plugins/jszip/jszip.min.js',
    '/plugins/pdfmake/pdfmake.min.js',
    '/plugins/pdfmake/vfs_fonts.js',
    '/plugins/datatables-buttons/js/buttons.html5.min.js',
    '/plugins/datatables-buttons/js/buttons.colVis.min.js',
    '/jquery-ui/jquery-ui.js',
    '/plugins/jquery/jquery.min.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});