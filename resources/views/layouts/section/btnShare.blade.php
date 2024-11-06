<?php 
           
            $Product_image_url = []; 
            $link = '/'; 
            $btn_share_title =   mb_substr($content_share,0,100)  ;
            $btn_share_text =   mb_substr($content_share,0,100)  ;
            $btn_share_url =   url()->current();
            ?> 
                <button type="button btn-sm" id="btn_share" class="btn btn-success"><i class="bi bi-share"></i> แชร์ให้เพื่อน</button>
                <input type="hidden" id="btn_share_title" value="{{$btn_share_title}}" > 
                <input type="hidden" id="btn_share_text" value="{{$btn_share_text}}" > 
                <input type="hidden" id="btn_share_url" value="{{$btn_share_url}}" > 
                <script>
                    const shareData = {
                    title: document.querySelector("#btn_share_title").value,
                    text: document.querySelector("#btn_share_text").value,
                    url: document.querySelector("#btn_share_url").value,
                    };

                    const btn = document.querySelector("#btn_share"); 

                    // Share must be triggered by "user activation"
                    btn.addEventListener("click", async () => {
                    try {
                        await navigator.share(shareData);
                        resultPara.textContent = "MDN shared successfully";
                    } catch (err) {
                        resultPara.textContent = `Error: ${err}`;
                    }
                    });
                </script>