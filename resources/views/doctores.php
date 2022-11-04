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
            <button class="btn btn-primary btn-sm" style="float: inline-end;" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Doctor</button>
        </div>
        <div class="col-lg-12"><br></div>
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Listado de Doctores</h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Patologia</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($dataToView['data']['doc'] as $doctores) {
                                $i++ ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $doctores->doctor; ?></td>
                                    <td><?php echo $doctores->patologia; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm editar_e" id="<?php echo $doctores->id . '::' . $doctores->doctor . '::' . $doctores->id_patologia; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">Editar</a>
                                        <a href="?c=citas&a=doctores&i=<?php echo $doctores->id; ?>" class="btn btn-primary btn-sm delete">Eliminar</a>
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
        <form action="?c=citas&a=doctores" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Doctor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre-doctor" class="col-form-label">Nombre del doctor:</label>
                            <input type="text" class="form-control" id="nombre-doctor" name="nombre-doctor" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre-doctor" class="col-form-label">Patologia que ocupa:</label>
                            <select name="listPatologia" id="listPatologia" class="form-control">
                                <?php if (isset($dataToView['data']['patologias'])) {
                                    foreach ($dataToView['data']['patologias'] as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"> <?php echo $p->patologia; ?> </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="guardar" name="guardar" value="doctores">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="?c=citas&a=doctores" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Doctor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="e_nombre-paciente" class="col-form-label">Nombre del Doctor:</label>
                            <input type="text" class="form-control" id="e_nombre" name="e_nombre" required>
                            <input type="hidden" class="form-control" id="e_id" name="e_id" required>
                            <label for="e_nombre-paciente" class="col-form-label">Patologia que ocupa:</label>
                            <select name="ePatologia" id="ePatologia" class="form-control">
                                <?php if (isset($dataToView['data']['patologias'])) {
                                    foreach ($dataToView['data']['patologias'] as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"> <?php echo $p->patologia; ?> </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="editar" name="editar" value="doctores">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>