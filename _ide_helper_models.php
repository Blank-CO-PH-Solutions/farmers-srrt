<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $service_request_id
 * @property int $uploaded_by
 * @property string $file_name
 * @property string $file_path
 * @property string|null $file_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ServiceRequest $serviceRequest
 * @property-read \App\Models\User $uploadedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereServiceRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attachment whereUploadedBy($value)
 */
	class Attachment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $office_type
 * @property string|null $municipality
 * @property string|null $province
 * @property string|null $contact_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Referral> $incomingReferrals
 * @property-read int|null $incoming_referrals_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Referral> $outgoingReferrals
 * @property-read int|null $outgoing_referrals_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceRequest> $serviceRequests
 * @property-read int|null $service_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestStatusHistory> $statusHistories
 * @property-read int|null $status_histories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereOfficeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Office whereUpdatedAt($value)
 */
	class Office extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $service_request_id
 * @property int $farmer_id
 * @property int $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $farmer
 * @property-read \App\Models\ServiceRequest $serviceRequest
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereServiceRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rating whereUpdatedAt($value)
 */
	class Rating extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $service_request_id
 * @property int $from_office_id
 * @property int $to_office_id
 * @property int $referred_by
 * @property string $reason
 * @property string $status
 * @property string|null $accepted_at
 * @property string|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Office $fromOffice
 * @property-read \App\Models\User $referredBy
 * @property-read \App\Models\ServiceRequest $serviceRequest
 * @property-read \App\Models\Office $toOffice
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereAcceptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereFromOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereServiceRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereToOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Referral whereUpdatedAt($value)
 */
	class Referral extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $service_request_id
 * @property string $status
 * @property int $office_id
 * @property int $changed_by
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $changedBy
 * @property-read \App\Models\Office $office
 * @property-read \App\Models\ServiceRequest $serviceRequest
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereChangedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereServiceRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RequestStatusHistory whereUpdatedAt($value)
 */
	class RequestStatusHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $reference_number
 * @property int $farmer_id
 * @property int $service_type_id
 * @property int $current_office_id
 * @property string $description
 * @property bool $is_calamity
 * @property string $priority
 * @property string $status
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property \Illuminate\Support\Carbon|null $submitted_at
 * @property \Illuminate\Support\Carbon|null $resolved_at
 * @property \Illuminate\Support\Carbon|null $closed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attachment> $attachments
 * @property-read int|null $attachments_count
 * @property-read \App\Models\Office $currentOffice
 * @property-read \App\Models\User $farmer
 * @property-read \App\Models\Rating|null $rating
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Referral> $referrals
 * @property-read int|null $referrals_count
 * @property-read \App\Models\ServiceType $serviceType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestStatusHistory> $statusHistories
 * @property-read int|null $status_histories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereCurrentOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereIsCalamity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereResolvedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereServiceTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceRequest whereUpdatedAt($value)
 */
	class ServiceRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $default_office_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Office|null $defaultOffice
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceRequest> $serviceRequests
 * @property-read int|null $service_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereDefaultOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereUpdatedAt($value)
 */
	class ServiceType extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $role
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Referral> $referrals
 * @property-read int|null $referrals_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceRequest> $serviceRequests
 * @property-read int|null $service_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestStatusHistory> $statusChanges
 * @property-read int|null $status_changes_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

