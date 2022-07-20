<?php
include('../../function/header.php');
include('../../function/nav_menu.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        />


        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/themes.css" />
        <title>Urges constructeur de CV</title>
    </head>
    <body>
        <!-- HEADER -->
        <header class="custom-header">
            <nav class="navbar navbar-expand-lg static-top navbar-dark">
                <div class="container">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarResponsive"
                        aria-controls="navbarResponsive"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- NAVIGATION -->
                    <div
                        class="collapse navbar-collapse mt-md-3"
                        id="navbarResponsive"
                    >
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <span id="nav-title">Themes:</span>
                            </li>
                            <li class="nav-item">
                                <button
                                    class="nav-link active pl-0 pr-0"
                                    id="theme-default-link"
                                    aria-label="Switch to default theme"
                                >
                                    Base
                                    <span class="sr-only">(current)</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button
                                    class="nav-link pl-0 pr-0"
                                    id="theme-modern-link"
                                    aria-label="Switch to modern theme"
                                >
                                    Moderne
                                </button>
                            </li>
                            <li class="nav-item">
                                <button
                                    class="nav-link pl-0 pr-0"
                                    id="theme-lavender-link"
                                    aria-label="Switch to lavender theme"
                                >
                                    En bleu
                                </button>
                            </li>
                            <li class="nav-item">
                                <button
                                    class="nav-link pl-0 pr-0"
                                    id="theme-deco-link"
                                    aria-label="Switch to deco theme"
                                >
                                    Decoration
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container main-container">
            <div id="cv">
                <!-- PRINTABLE HTML-->
                <div id="printable" class="ml-auto mr-auto sortable-list"></div>

                <!-- New Section Buttons -->
                <div id="add-section">
                    <button
                        id="add-section-btn"
                        class="text-center"
                        aria-label="Add new section"
                    >
                        <i class="fas fa-plus-circle"></i>
                        Nouvelle Section
                    </button>
                    <div id="close-section" class="text-right">
                        <i class="fas fa-times-circle"></i>
                    </div>

                    <div
                        class="row m-2 text-center hide"
                        id="new-section-buttons"
                    >
                        <button
                            class="col-md-3 section-btn pb-4 pb-md-0"
                            id="newinfo-btn"
                            aria-label="Add new info section"
                        >
                            <img
                                src="assets/img/new-section-info.png"
                                alt="Add new info section"
                            />
                            Info
                        </button>
                        <button
                            class="col-md-3 section-btn pb-4 pb-md-0"
                            id="newlisting-btn"
                            aria-label="Add new listing section"
                        >
                            <img
                                src="assets/img/new-section-listing.png"
                                alt="Add new listing section"
                            />
                            Liste
                        </button>
                        <button
                            class="col-md-3 section-btn pb-4 pb-md-0"
                            id="new3col-btn"
                            aria-label="Add new three column section"
                        >
                            <img
                                src="assets/img/new-section-3-col.png"
                                alt="Add new three column section"
                            />
                            trois Colonne
                        </button>
                        <button
                            class="col-md-3 section-btn"
                            id="newsingleblock-btn"
                            aria-label="Add new block section"
                        >
                            <img
                                src="assets/img/new-section-block.png"
                                alt="Add new block section"
                            />
                            Block
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Succesful save alert -->
            <div
                id="save-alert"
                class="alert alert-success alert-dismissible fade show text-center"
                role="alert"
            >
                <strong>CV sauvegarder!</strong>
                <p>
                   Ton CV a bien était enregistrer.
                    <br />
                    fait attention a ne pas supprimer ton cache cela entrainera une perte
					de ta sauvegarde
                </p>
                <button type="button" class="close" aria-label="Close alert">
                    <span aria-hidden="true" class="close-alert">
                        <i class="fas fa-times-circle"></i>
                    </span>
                </button>
            </div>

            <!-- Action Buttons -->
            <div class="actions text-center">
                <button
                    class="btn btn-primary action-btn"
                    id="reset-alert-btn"
                    data-toggle="modal"
                    data-target="#reset-modal"
                    aria-label="Reset CV"
                >
					Recommencer
                    <i class="fas fa-undo-alt"></i>
                </button>
                <button
                    class="btn btn-primary action-btn"
                    id="save-btn"
                    aria-label="Save Cv"
                >
                    Sauvegarder
                    <i class="far fa-save"></i>
                </button>
                <button
                    class="btn btn-primary action-btn"
                    id="download-btn"
                    aria-label="Download as pdf"
                >
                    Telecharge PDF
                    <i class="fas fa-file-download"></i>
                </button>
            </div>
        </div>
        <!-- Modal Window to reset content to default-->
        <div class="modal" id="reset-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Est-tu sur ?
                        </h4>
                        <button
                            type="button"
                            class="close close-modal"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">
                                <i class="fas fa-times-circle"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Si tu confirme tout sera perdu
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-primary"
                            id="reset-btn"
                            data-dismiss="modal"
                            aria-label="reset"
                        >
                            Recommencer
                            <i class="fas fa-undo-alt"></i>
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                            aria-label="cancel"
                        >
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="assets/js/html2pdf.bundle.min.js"></script>
        <script src="assets/js/anchorme.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
