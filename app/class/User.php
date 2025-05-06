<?php

namespace app\class;

class User
{
    public const FIELD_EMAIL = 'email';

    public function isAuthorized(): bool
    {
        return false;
    }

    public function isAdmin(): bool
    {
        return false;
    }

    public function isCreatedInRemoteResource(): bool
    {
        return false;
    }

    public function isUpdatedInRemoteResource(): bool
    {
        return false;
    }

    public function init(): bool
    {
        if (!$this->isCreatedInRemoteResource()) {
            return false;
        }
        if (!$this->isUpdatedInRemoteResource()) {
            return false;
        }
        if (!$this->isAuthorized()) {
            return false;
        }
        if (!$this->isAdmin()) {
            return false;
        }

        return true;
    }
}