<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin{
/**
 * App\Models\Admin\Auths
 *
 * @property int $id
 * @property string $name
 * @property string $auths
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Users[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Auths newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auths newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auths query()
 * @method static \Illuminate\Database\Eloquent\Builder|Auths whereAuths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auths whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auths whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auths whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auths whereUpdatedAt($value)
 */
	class Auths extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Users
 *
 * @property int $id
 * @property string $token
 * @property int $auth_id
 * @property int $log_kayit
 * @property int $iki_adimli
 * @property int $hesap_onay
 * @property int $darkmode
 * @property string $eposta
 * @property string $sifre
 * @property string|null $profil_resmi
 * @property string $ad
 * @property string $soyad
 * @property string $telefon
 * @property string|null $dogum_tarihi
 * @property string|null $adres
 * @property string $dil
 * @property string $tarih_formati
 * @property string $zaman_dilimi
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\UsersNotifications[] $notifications
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\UsersActivities[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Admin\Auths|null $auth
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAdres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereAuthId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereDarkmode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereDil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereDogumTarihi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereEposta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereHesapOnay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereIkiAdimli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereLogKayit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereNotifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereProfilResmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSifre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSoyad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereTarihFormati($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereTelefon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereZamanDilimi($value)
 */
	class Users extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\UsersActivities
 *
 * @property int $id
 * @property int $user_id
 * @property string $browser
 * @property string $ip
 * @property string $tag
 * @property string|null $operation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin\Users|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereOperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersActivities whereUserId($value)
 */
	class UsersActivities extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\UsersNotifications
 *
 * @property int $id
 * @property int $user_id
 * @property int $read_state
 * @property string $icon
 * @property string $renk
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $diff_created_date
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereReadState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereRenk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersNotifications whereUserId($value)
 */
	class UsersNotifications extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Categories
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Products[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereUpdatedAt($value)
 */
	class Categories extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Products
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $picture
 * @property string $name
 * @property string|null $desc
 * @property float $price
 * @property float|null $sale_price
 * @property int $durum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categories|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereDurum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereUpdatedAt($value)
 */
	class Products extends \Eloquent {}
}

