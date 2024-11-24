<?php 
if(!isset($news_id)) {
    echo '<article>
            <a href="index.php?menu=2&news_id=1"><img src="images/thumb1.jpg" alt="Slika članka 1"></a>
            <div>
                <h2><a href="index.php?menu=2&news_id=1">Naslov članka 1</a></h2>
                <time datetime="2024-11-15">15. studenoga 2024</time>
                <p>Kratki opis članka 1. Pročitajte više o ovoj zanimljivoj temi.</p>
                <a href="index.php?menu=2&news_id=1">Pročitaj više</a>
            </div>
        </article>
        <!-- Članak 2 -->
        <article>
            <a href="index.php?menu=2&news_id=2""><img src="images/thumb2.jpg" alt="Slika članka 2"></a>
            <div>
                <h2><a href="index.php?menu=2&news_id=2"">Naslov članka 2</a></h2>
                <time datetime="2024-11-10"> 10. studenoga 2024.</time>
                <p>Kratki opis članka 2. Saznajte više o ovoj interesantnoj priči.</p>
                <a href="index.php?menu=2&news_id=2">Pročitaj više</a>
            </div>
        </article>
        <!-- Članak 3 -->
        <article>
            <a href="index.php?menu=2&news_id=3"><img src="images/thumb3.jpg" alt="Slika članka 3"></a>
            <div>
                <h2><a href="index.php?menu=2&news_id=3">Naslov članka 3</a></h2>
                <time datetime="2024-11-5">5. studenog 2024</time>
                <p>Kratki opis članka 3. Kliknite kako biste otkrili više detalja.</p>
                <a href="index.php?menu=2&news_id=3">Pročitaj više</a>
            </div>
        </article>
        <!-- Članak 4 -->
        <article>
            <a href="index.php?menu=2&news_id=4"><img src="images/thumb4.jpg" alt="Slika članka 4"></a>
            <div>
                <h2><a href="index.php?menu=2&news_id=4">Naslov članka 4</a></h2>
                <time datetime="2024-10-20">20. listopada 2024</time>
                <p>Kratki opis članka 4. Otkrijte sve što trebate znati o ovoj temi.</p>
                <a href="index.php?menu=2&news_id=4">Pročitaj više</a>
            </div>
        </article>
        <!-- Članak 5 -->
        <article>
            <a href="index.php?menu=2&news_id=5"><img src="images/thumb5.jpg" alt="Slika članka 5"></a>
            <div>
                <h2><a href="index.php?menu=2&news_id=5">Naslov članka 5</a></h2>
                <time datetime="2024-10-12">12. listopada 2024</time>
                <p>Kratki opis članka 5. Više informacija potražite u članku.</p>
                <a href="index.php?menu=2&news_id=5">Pročitaj više</a>
            </div>
        </article>
        <div class="cisti"></div>';
}
else {
    switch($news_id){
        case 1: 
            echo '<section class="gallery">
                <h2>Galerija slika</h2>
                <figure>
                    <a href="images/thumb1.jpg" target="_blank"><img src="images/thumb1.jpg" alt="Opis slike 1">
                    <figcaption>Opis slike 1</figcaption></a>
                </figure>
                <figure>
                    <a href="images/gl12.jpg" target="_blank"><img src="images/gl12.jpg" alt="Opis slike 2" width="150px" height="auto">
                    <figcaption>Opis slike 2</figcaption></a>
                </figure>
                <figure>
                    <a href="images/gl13.jpg" target="_blank"><img src="images/gl13.jpg" alt="Opis slike 3" width="150px" height="auto">
                    <figcaption>Opis slike 3</figcaption></a>
                </figure>          
                </section>
        
                <div class="cisti"></div>
                <hr>
                <h1>Naslov članka 1</h1>
                <h2>Podnaslov članka 1</h2>
                
                <p><strong>Datum objave:</strong>   <time datetime="2024-11-15">15. studenoga 2024</time></p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem porro cum adipisci magni, sunt dolores nulla debitis vitae animi commodi, qui dicta ipsa eaque quibusdam necessitatibus eum voluptatibus ea. Itaque.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum unde voluptatem tempore quis earum numquam qui velit? Eligendi natus molestias assumenda dolorum, nulla aut libero ipsam pariatur quae! Dolorem.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla enim voluptatum asperiores atque voluptas a quaerat fugit corrupti saepe cupiditate cumque, harum eveniet? Qui deleniti ipsam optio doloremque, perferendis maxime.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, consequuntur ducimus! Natus aperiam minus accusantium iusto eaque praesentium nesciunt amet quasi atque consectetur. Dignissimos, culpa? Adipisci asperiores error pariatur consequuntur.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore modi repudiandae accusamus, atque perferendis expedita mollitia harum libero maxime alias. Necessitatibus, similique earum ex ab ipsam laborum deleniti aspernatur rerum?</p>
                <hr>
                <a href="index.html" class="back-link">← Povratak na početnu</a>
                <div class="cisti"></div>';
                break;

        case 2: 
            echo '<section class="gallery">
                    <h2>Galerija slika</h2>
                    <figure>
                        <a href="images/thumb1.jpg" target="_blank"><img src="images/bgl1.jpg" alt="Opis slike 1">
                        <figcaption>Opis slike 1</figcaption></a>
                    </figure>
                    <figure>
                        <a href="images/gl12.jpg" target="_blank"><img src="images/bgl2.jpg" alt="Opis slike 2" width="150px" height="auto">
                        <figcaption>Opis slike 2</figcaption></a>
                    </figure>
                    <figure>
                        <a href="images/gl13.jpg" target="_blank"><img src="images/bgl3.jpg" alt="Opis slike 3" width="150px" height="auto">
                        <figcaption>Opis slike 3</figcaption></a>
                    </figure>          
                </section>
            
                <div class="cisti"></div>
                <hr>
                <h1>Naslov članka 2</h1>
                <h2>Podnaslov članka 2</h2>
                
                <p><strong>Datum objave:</strong>   <time datetime="2024-11-10"> 10. studenoga 2024.</time></p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem porro cum adipisci magni, sunt dolores nulla debitis vitae animi commodi, qui dicta ipsa eaque quibusdam necessitatibus eum voluptatibus ea. Itaque.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum unde voluptatem tempore quis earum numquam qui velit? Eligendi natus molestias assumenda dolorum, nulla aut libero ipsam pariatur quae! Dolorem.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla enim voluptatum asperiores atque voluptas a quaerat fugit corrupti saepe cupiditate cumque, harum eveniet? Qui deleniti ipsam optio doloremque, perferendis maxime.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, consequuntur ducimus! Natus aperiam minus accusantium iusto eaque praesentium nesciunt amet quasi atque consectetur. Dignissimos, culpa? Adipisci asperiores error pariatur consequuntur.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore modi repudiandae accusamus, atque perferendis expedita mollitia harum libero maxime alias. Necessitatibus, similique earum ex ab ipsam laborum deleniti aspernatur rerum?</p>
                <hr>
                <a href="index.html" class="back-link">← Povratak na početnu</a>
                <div class="cisti"></div>';
                break;

        case 3:
            echo '<section class="gallery">
                    <h2>Galerija slika</h2>
                    <figure>
                        <a href="images/thumb1.jpg" target="_blank"><img src="images/bgl4.jpg" alt="Opis slike 1">
                        <figcaption>Opis slike 1</figcaption></a>
                    </figure>
                    <figure>
                        <a href="images/gl12.jpg" target="_blank"><img src="images/bgl5.jpg" alt="Opis slike 2" width="150px" height="auto">
                        <figcaption>Opis slike 2</figcaption></a>
                    </figure>
                    <figure>
                        <a href="images/gl13.jpg" target="_blank"><img src="images/bgl6.jpg" alt="Opis slike 3" width="150px" height="auto">
                        <figcaption>Opis slike 3</figcaption></a>
                    </figure>          
                </section>
            
                <div class="cisti"></div>
                <hr>
                <h1>Naslov članka 3</h1>
                <h2>Podnaslov članka 3</h2>
                
                <p><strong>Datum objave:</strong>      <time datetime="2024-11-5">5. studenog 2024</time></p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem porro cum adipisci magni, sunt dolores nulla debitis vitae animi commodi, qui dicta ipsa eaque quibusdam necessitatibus eum voluptatibus ea. Itaque.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum unde voluptatem tempore quis earum numquam qui velit? Eligendi natus molestias assumenda dolorum, nulla aut libero ipsam pariatur quae! Dolorem.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla enim voluptatum asperiores atque voluptas a quaerat fugit corrupti saepe cupiditate cumque, harum eveniet? Qui deleniti ipsam optio doloremque, perferendis maxime.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, consequuntur ducimus! Natus aperiam minus accusantium iusto eaque praesentium nesciunt amet quasi atque consectetur. Dignissimos, culpa? Adipisci asperiores error pariatur consequuntur.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore modi repudiandae accusamus, atque perferendis expedita mollitia harum libero maxime alias. Necessitatibus, similique earum ex ab ipsam laborum deleniti aspernatur rerum?</p>
                <hr>
                <a href="index.html" class="back-link">← Povratak na početnu</a>
                <div class="cisti"></div>';
                break;


        case 4:
            echo '<section class="gallery">
                <h2>Galerija slika</h2>
                <figure>
                    <a href="images/thumb1.jpg" target="_blank"><img src="images/bgl7.jpg" alt="Opis slike 1">
                    <figcaption>Opis slike 1</figcaption></a>
                </figure>
                <figure>
                    <a href="images/gl12.jpg" target="_blank"><img src="images/bgl8.jpg" alt="Opis slike 2" width="150px" height="auto">
                    <figcaption>Opis slike 2</figcaption></a>
                </figure>
                <figure>
                    <a href="images/gl13.jpg" target="_blank"><img src="images/bgl9.jpg" alt="Opis slike 3" width="150px" height="auto">
                    <figcaption>Opis slike 3</figcaption></a>
                </figure>          
                </section>
        
                <div class="cisti"></div>
                <hr>
                <h1>Naslov članka 4</h1>
                <h2>Podnaslov članka 4</h2>
                
                <p><strong>Datum objave:</strong>  <time datetime="2024-10-20">20. listopada 2024</time></p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem porro cum adipisci magni, sunt dolores nulla debitis vitae animi commodi, qui dicta ipsa eaque quibusdam necessitatibus eum voluptatibus ea. Itaque.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum unde voluptatem tempore quis earum numquam qui velit? Eligendi natus molestias assumenda dolorum, nulla aut libero ipsam pariatur quae! Dolorem.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla enim voluptatum asperiores atque voluptas a quaerat fugit corrupti saepe cupiditate cumque, harum eveniet? Qui deleniti ipsam optio doloremque, perferendis maxime.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, consequuntur ducimus! Natus aperiam minus accusantium iusto eaque praesentium nesciunt amet quasi atque consectetur. Dignissimos, culpa? Adipisci asperiores error pariatur consequuntur.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore modi repudiandae accusamus, atque perferendis expedita mollitia harum libero maxime alias. Necessitatibus, similique earum ex ab ipsam laborum deleniti aspernatur rerum?</p>
                <hr>
                <a href="index.html" class="back-link">← Povratak na početnu</a>
                <div class="cisti"></div>';
            break;

        case 5:
        echo '<section class="gallery">
                <h2>Galerija slika</h2>
                <figure>
                    <a href="images/thumb1.jpg" target="_blank"><img src="images/bgl1.jpg" alt="Opis slike 1">
                    <figcaption>Opis slike 1</figcaption></a>
                </figure>
                <figure>
                    <a href="images/gl12.jpg" target="_blank"><img src="images/bgl3.jpg" alt="Opis slike 2" width="150px" height="auto">
                    <figcaption>Opis slike 2</figcaption></a>
                </figure>
                <figure>
                    <a href="images/gl13.jpg" target="_blank"><img src="images/bgl5.jpg" alt="Opis slike 3" width="150px" height="auto">
                    <figcaption>Opis slike 3</figcaption></a>
                </figure>          
            </section>
        
            <div class="cisti"></div>
            <hr>
            <h1>Naslov članka 5</h1>
            <h2>Podnaslov članka 5</h2>
            
            <p><strong>Datum objave:</strong> <time datetime="2024-10-12">12. listopada 2024</time></p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem porro cum adipisci magni, sunt dolores nulla debitis vitae animi commodi, qui dicta ipsa eaque quibusdam necessitatibus eum voluptatibus ea. Itaque.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius illum unde voluptatem tempore quis earum numquam qui velit? Eligendi natus molestias assumenda dolorum, nulla aut libero ipsam pariatur quae! Dolorem.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla enim voluptatum asperiores atque voluptas a quaerat fugit corrupti saepe cupiditate cumque, harum eveniet? Qui deleniti ipsam optio doloremque, perferendis maxime.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, consequuntur ducimus! Natus aperiam minus accusantium iusto eaque praesentium nesciunt amet quasi atque consectetur. Dignissimos, culpa? Adipisci asperiores error pariatur consequuntur.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore modi repudiandae accusamus, atque perferendis expedita mollitia harum libero maxime alias. Necessitatibus, similique earum ex ab ipsam laborum deleniti aspernatur rerum?</p>
            <hr>
            <a href="index.html" class="back-link">← Povratak na početnu</a>
            <div class="cisti"></div>';
            break;
    }
}


?>