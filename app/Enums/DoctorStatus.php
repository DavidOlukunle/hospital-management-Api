<?php
namespace App\Enums;

enum DoctorStatus: string
{
    case PROCESSING = 'processing';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}
