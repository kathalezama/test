    <?php $i = 0; ?>
    <div class="container" style="width:60%;">
        <div class="row">
            <?php if (isset($dataToView['data']['mensaje'])) { ?>
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        <?php echo $dataToView['data']['mensaje']; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-12">
                <button class="btn btn-primary btn-sm" style="float: inline-end;" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Patologia</button>
            </div>
            <div class="col-lg-12"><br></div>
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header">Listado de Patologias</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Patologia</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($dataToView['data']['pato'] as $patologias) {
                                    $i++ ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $patologias->patologia; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm editar" id="<?php echo $patologias->id . '::' . $patologias->patologia; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">Editar</a>
                                            <a href="?c=citas&a=patologias&i=<?php echo $patologias->id; ?>" class="btn btn-primary btn-sm delete">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="?c=citas&a=patologias" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Patologia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nombre-patologia" class="col-form-label">Nombre de la patologia:</label>
                                <input type="text" class="form-control" id="nombre-patologia" name="nombre-patologia" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="guardar" name="guardar" value="patologias">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="?c=citas&a=patologias" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Patologia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="e_nombre-paciente" class="col-form-label">Nombre de la patologia:</label>
                                <input type="text" class="form-control" id="e_nombre" name="e_nombre" required>
                                <input type="hidden" class="form-control" id="e_id" name="e_id" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="editar" name="editar" value="patologias">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>