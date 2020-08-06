<?php
if (isset($_POST['g-recaptcha-response'])){
    //проверяем дальше
}else{
    exit('Вы не прошли валидацию reCaptcha');
}
?>
<?php
if (isset($_POST['g-recaptcha-response'])) {
    $url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";
    $secret_key = '6LfBsKcUAAAAAOQNlpchqNKQeZAk_QW4fNdtB6Vz';
    $query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
    $data = json_decode(file_get_contents($query));
    if ($data->success) {
        // Продолжаем работать с данными для авторизации из POST массива
    } else {
		exit('Извините, но похоже вы робот \(0_0)/');
    }
} else {
    exit('Вы не прошли валидацию reCaptcha');
}
?>






