<?php



function historyelements($name_p,$id_p,$img1,$siz,$qty,$prix,$dt,$stu){
  $history='
    <div class="tr_item">
      <div class="td_item item_img">
      <img src="data:image/jpeg;base64,'. base64_encode($img1).'" />
      </div>
      <div class="td_item item_name">
        <label class="main">'.$name_p.'</label>
        <label class="sub">Ref. '.$id_p.'</label>
      </div>
      <div class="td_item item_color">
      <label>Date  : '.$dt.'</label>
        <label>Size : '.$siz.'</label>
      </div>
      <div class="td_item item_price">
        <label>Qty: '.$qty.'</label>
      </div>
      <div class="td_item item_price">
        <label>'.$prix.'  DH</label>
      </div>
      <div class="td_item item_remove">
               <img src="'.$stu.'" width="20px"/>
      </div>
    </div>';

echo $history;
}


?>