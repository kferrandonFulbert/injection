<?php
$taille = isset($_GET['taille']) ? $_GET['taille'] : 600;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <form action="index.php">
                    <div class="row gx-4 gx-lg-5 align-items-center">                
                        <div class="col-md-6">
                            <img class="card-img-top " src="parfum.jpg" alt="..." width="<?= $taille ?>" height="<?= $taille ?>" /></div>
                        <div class="col-md-6">
                            <div class="small mb-1">SKU: BST-498</div>
                            <h1 class="display-5 fw-bolder">DIOR Miss Dior Eau de Parfum</h1>
                            <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through">$45.00</span>
                                <span>$40.00</span>
                            </div>

                            <p class="lead">

                                La nouvelle eau de parfum Miss Dior, le rêve couture. Une composition aux nombreuses couleurs dans un flacon paré d'un nœud extraordinaire.
                                La nouvelle eau de parfum Miss Dior est un bouquet floral coloré, tel un « millefiori » dans lequel vivent des notes de rose de Grasse, de pivoine, ...
                            <p>

                            <div class="d-flex">
                                <select class="form-control text-center me-4" name="taille" id="taille" style="max-width: 4rem">
                                    <option value="500">50ml</option>
                                    <option value="750">75ml</option>
                                    <option value="1000">100ml</option>
                                </select>
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" >
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div> </form>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-2 row-cols-xl-3 justify-content-center">
                    <div class="col mb-7">
                        <div class="card h-100">
                            <h2 class="fw-bolder mb-4">Products Rating</h2>            
                            <?php
                            $db = new PDO("mysql:host=localhost;dbname=secu", "root", "");
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nom = $_POST['nom'];
                                $commentaire = $_POST['commentaire'];

                                $req = "insert into product(nom, commentaire) values('$nom', '$commentaire')";
                                $sth = $db->prepare($req);
                                $sth->execute();
                            }
                            $aff = 'select * from product';
                            ?>
                            <table class="paleBlueRows">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Commentaire</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        foreach ($db->query($aff, PDO::FETCH_ASSOC) as $livre) {
                                            //echo $livre['nom'] . ' ' . $livre['commentaire'] . " <br>";
                                            ?>

                                            <?php
                                            echo "<td>" . $livre['id'] . "</td>";
                                            echo "<td>" . $livre['nom'] . "</td>";
                                            echo "<td>" . $livre['commentaire'] . "</td>";
                                            ?>
                                        </tr> 
                                    <?php } ?>
                                </tbody>
                            </table>
                            <style>
                                table.paleBlueRows {
                                    font-family: "Times New Roman", Times, serif;
                                    border: 1px solid #FFFFFF;
                                    width: 350px;
                                    height: 200px;
                                    text-align: center;
                                    border-collapse: collapse;
                                }
                                table.paleBlueRows td, table.paleBlueRows th {
                                    border: 1px solid #FFFFFF;
                                    padding: 3px 2px;
                                }
                                table.paleBlueRows tbody td {
                                    font-size: 13px;
                                }
                                table.paleBlueRows tr:nth-child(even) {
                                    background: #D0E4F5;
                                }
                                table.paleBlueRows thead {
                                    background: #0B6FA4;
                                    border-bottom: 5px solid #FFFFFF;
                                }
                                table.paleBlueRows thead th {
                                    font-size: 17px;
                                    font-weight: bold;
                                    color: #FFFFFF;
                                    text-align: center;
                                    border-left: 2px solid #FFFFFF;
                                }
                                table.paleBlueRows thead th:first-child {
                                    border-left: none;
                                }

                                table.paleBlueRows tfoot {
                                    font-size: 14px;
                                    font-weight: bold;
                                    color: #333333;
                                    background: #D0E4F5;
                                    border-top: 3px solid #444444;
                                }
                                table.paleBlueRows tfoot td {
                                    font-size: 14px;
                                }
                            </style></div></div>
                
                    <div class="col mb-5">
                        <div class="card h-100">
<?php include("add-rating.php"); ?>
                        </div>
                    </div>
                </div>
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Products Rating</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>>
    </body>
</html>

