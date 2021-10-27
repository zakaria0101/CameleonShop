<?php


function panierelements($name_p,$id_p,$img1,$siz,$qty,$prix){
    $produit='
    <form action="cart-page.php?action=remove&id='.$id_p.'" method="post">
    <div class="tr_item">
                <div class="td_item item_img">
                <img src="data:image/jpeg;base64,'. base64_encode($img1).'" />
                </div>
                <div class="td_item item_name">
                  <label class="main">'.$name_p.'</label>
                  <label class="sub">Ref. '.$id_p.'</label>
                </div>
                <div class="td_item item_color">
                  <label>'.$siz.'</label>
                </div>
                <div class="td_item item_qty">
                  <label>'.$qty.'</label>
                </div>
                <div class="td_item item_price">
                  <label>'.$prix.' DH</label>
                </div>
                <div class="td_item item_remove">
                  <button type="submit" name="remove" class="delete">
                 <img src="images/icon/close.png" width="20px"/>
                  </button>
                </div>
              </div>
 </form>';

  echo $produit;
}

?>