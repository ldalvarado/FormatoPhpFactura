<?php include(HTML_DIR . 'private/header.php'); ?>
    <body>        
        <section id="error-container">
            <div class="block-error">
                    
                <header>
                    <h1 class="error">404</h1>
                    <p class="text-center">Page not found</p>
                </header>
                    
                <p class="text-center">Tenemos problemas para cargar la página que está buscando.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-info btn-block btn-3d" href="?view=index">Volver al inicio</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Pagina previa</button>
                    </div>
                </div>
            </div>

        </section>
<?php include(HTML_DIR . 'private/footer.php'); ?>
