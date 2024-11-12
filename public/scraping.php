 
<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
// URL ของหน้าเว็บที่ต้องการดึงข้อมูล
$url = '';
if(isset($_GET['tax_id'])){
    $url = "https://data.creden.co/company/general/".$_GET['tax_id'];
}else{
    exit(0);
} 

// เริ่มต้น cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
curl_close($ch);

// ตรวจสอบว่าได้ข้อมูลมาแล้วหรือยัง
if ($response !== false) {
    // สร้าง DOMDocument และโหลด HTML
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // ปิด error เนื่องจาก HTML อาจมีปัญหา
    $dom->loadHTML($response);
    libxml_clear_errors();

    // ใช้ DOMXPath เพื่อค้นหา element ที่มีชื่อบริษัท
    $xpath = new DOMXPath($dom);
    // สมมติว่าชื่อบริษัทอยู่ใน element h1 หรือ tag ที่คาดว่าจะเก็บชื่อบริษัท
    $companyName = $xpath->query("//td");
    $companyName_th = $xpath->query("//h1");
    $companyName_th = mb_convert_encoding($companyName_th->item(0)->nodeValue , 'ISO-8859-1', 'UTF-8');
    $companyName_th = trim($companyName_th );  
    $companyName_th = str_replace( '\n', '', $companyName_th ); 
    $company_address1 = $xpath->query('//div[contains(@class,"box_maps")]//p');
    $company_address1 = mb_convert_encoding($company_address1->item(0)->nodeValue , 'ISO-8859-1', 'UTF-8');
     
    echo json_encode([
        'company_name'=> $companyName->item(0)->nodeValue ,
        'company_tax_id'=> $companyName->item(1)->nodeValue ,
        'company_th'=> $companyName_th,
        'company_address1'=> $company_address1 ,
        'url'=> $url
    ]);
 //   echo $myJSON;
     die();
}
?>

 