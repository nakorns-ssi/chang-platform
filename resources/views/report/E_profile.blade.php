<?php // dd($model ,$model['model_running_list'],$model['model_lot'],$model['filter']);

 
?>
<html>
  <head>
      <title>พร้อมบรรจุ:นนทบุรี </title>
   
      <style>
      @page {
          margin: 5mm 10mm 5mm 10mm;
      }
  
      body { 
          font-size: 10px;
          line-height: 1.5;
      }
  
      table {
          border-collapse: collapse;
          width: 100%;
      }
  
      td,
      th {
          border-top:none ;
          border-bottom:none ;  
          border-width: 0.1mm ;
          border: 0.1mm solid #000;
          text-align: center;
          padding: 1.8px;
      }
  
      /* .table-data tr:nth-child(even) {
          background-color: #dddddd;
      }  
      */
      </style>
  </head>
      <body> 
  
    
<div  style="text-align: left ; vertical-align:  " >
    ณ ประจำวันที่ {{date('d/m/Y')}} 
</div>  
<table  cellspacing="0" cellpadding="0" > 
  <tr> 
      <td width="33%" style="padding-left: 5mm;border-left:none ;border-right:none ;border-bottom:none ;border-style:none;text-align: left ; vertical-align: text-top;">
           
        <br/>  <br/>  ผู้จัดทำ................................................................................
      </td>
      <td width="33%" style="padding-left: 5mm;border-left:none ;border-right:none ;border-bottom:none ;border-style:none;text-align: left ; vertical-align: text-top;">
           
        <br/>  <br/> ผู้ทบทวน................................................................................
      </td>
      <td width="33%" style="padding-left: 5mm;border-left:none ;border-right:none ;border-bottom:none ;border-style:none;text-align: left ; vertical-align: text-top;">
           
        <br/>  <br/> ผู้อนุมัติ................................................................................
      </td>
  </tr>
</table>
</body>
</html>