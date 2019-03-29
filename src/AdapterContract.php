<?php

namespace SimpleCache\Contract;


interface AdapterContract
{

    /**
     * Fetches a value from the cache.
     *
     * @param string $key     The unique key of this item in the cache.
     *
     * @return mixed The value of the item from the cache, or $default in case of cache miss.
     */
    public function get($key);


    /**
     * Persists data in the cache.
     *
     * @param string                 $key   The key of the item to store.
     * @param string                 $value The value of the item to store. Must be serializable.
     * @param int                    $ttl   The TTL value of this item. If no value is sent and
     *                                      the driver supports TTL then the library may set a default value
     *                                      for it or let the driver take care of that.
     *
     * @return bool True on success and false.
     */
    public function set($key, $value, $ttl);


    /**
     * Delete an item from the cache by its unique key.
     *
     * @param string $key The unique cache key of the item to delete.
     *
     * @return bool True if the item was successfully removed. False if there was an error.
     */
    public function delete($key);


    /**
     * Wipes clean the entire cache's keys.
     *
     * @return bool True on success and false on failure.
     */
    public function clear();


    /**
     * Determines whether an item is present in the cache.
     *
     * NOTE: It is recommended that has() is only to be used for cache warming type purposes
     * and not to be used within your live applications operations for get/set, as this method
     * is subject to a race condition where your has() will return true and immediately after,
     * another script can remove it, making the state of your app out of date.
     *
     * @param string $key The cache item key.
     *
     * @return bool
     */
    public function has($key);
}
