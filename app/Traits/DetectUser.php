<?php

namespace App\Traits;

use Cache;

trait DetectUser {

    /**
     * Get user role.
     *
     * @return string
     */
    public function getRoleSlug() {
        return $this->role->slug;
    }

    /**
     * Check admin role
     *
     * @return bool
     */
    public function isAdmin() {
        return $this->getRoleSlug() == 'admin';
    }

    /**
     * Returns whether a user has a role of 'moderator'
     *
     * @return boolean
     */
    public function isModerator() {
        return $this->getRoleSlug() === 'moderator';
    }

    /**
     * Check citizen role
     *
     * @return bool
     */
    public function isUser() {
        return $this->getRoleSlug() === 'user';
    }

    /**
     * Returns whether a user has a role of 'moderator' or 'admin'
     *
     * @return boolean
     */
    public function isElevated() {
        return $this->isAdmin() || $this->isModerator();
    }

    /**
     * Check user is currently online
     */
    public function isOnline() {
        return Cache::has('user-is-online-' . $this->id);
    }

}
