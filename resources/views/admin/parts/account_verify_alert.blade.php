@if(getCurrentUser()->hesap_onay == 0)
    @if(Cache::has("account_verify_".getCurrentUser()->token))
        <div class="alert alert-fill alert-icon alert-primary" role="alert">
            <em class="icon ni ni-history"></em>
            <strong>Bekliyor</strong> Size hesabınızı onaylamanız için bir e-posta gönderdik. 1 saat sonra tekrar bağlantı oluşturabilirsiniz.
        </div>
    @else
        <div class="alert alert-fill alert-icon alert-primary" role="alert">
            <em class="icon ni ni-emails-fill"></em>
            <strong>Hesap Doğrulama</strong> {{ config("app.name") }} için kısıtlamaları kaldırmak ve güvenliğinizi arttırmak için e-posta adresine göndereceğimiz bağlantıya tıkla !
            <a href="{{ route('admin.home.send_account_verify_mail') }}" class="btn btn-xs btn-light ml-4" style="float: right;">Bağlantıyı Gönder</a>
        </div>
    @endif
@endif
