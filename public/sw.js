const staticCacheName = 'zg-static-cache'
const dynamicCacheName = 'zg-dynamic-cache'
const staticAssets = []

// Listen for install event, set callback
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(staticCacheName).then(cache => {
            cache.addAll(staticAssets)
        })
    )
});

// Activate event
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(keys
                .filter(key => key !== staticCacheName && key !== dynamicCacheName)
                .map(key => caches.delete(key))
            )
        })
    )
})

// Fetch event
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(cacheRes => {
            return cacheRes || fetch(event.request).then(fetchRes => {
                return caches.open(dynamicCacheName).then(cache => {
                    cache.put(event.request.url, fetchRes.clone())
                    return fetchRes
                })
            })
        })/*.catch(() => caches.match(Routing.generate('zavrti_globus')))*/
    )
})