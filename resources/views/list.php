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
            <button class="btn btn-primary btn-sm" style="float: inline-end;" data-bs-toggle="modal" data-bs-target="#exampleModal">Nueva Cita</button>
        </div>
        <div class="col-lg-12"><br></div>
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Citas</h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Estatus</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($dataToView['data']['citas'] as $citas) {
                                $i++ ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $citas->fecha; ?></td>
                                    <td><?php echo $citas->hora; ?></td>
                                    <td><?php echo $citas->paciente; ?></td>
                                    <td><?php echo $citas->doctor; ?></td>
                                    <td><?php echo $citas->estatus; ?></td>
                                    <td>
                                        <?php if($citas->estatus!="Atendido") { ?>
                                        <a href="#" class="btn btn-primary btn-sm editar_cita" id="<?php echo $citas->id . '::' . $citas->id_paciente . '::' . $citas->id_doctor. '::' . $citas->fecha . '::' . $citas->hora; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">Editar</a>
                                        <a href="?c=citas&a=list&i=<?php echo $citas->id; ?>" class="btn btn-primary btn-sm delete">Eliminar</a>
                                        <a href="?c=citas&a=list&x=<?php echo $citas->id; ?>" class="btn btn-primary btn-sm atendido">Atender</a>
                                        <?php } ?>
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
        <form action="?c=citas&a=list" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Cita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre-paciente" class="col-form-label">paciente:</label>
                            <select name="pacientes" id="pacientes" class="form-control">
                                <?php if (isset($dataToView['data']['pacientes'])) {
                                    foreach ($dataToView['data']['pacientes'] as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"> <?php echo $p->paciente; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <label for="nombre-paciente" class="col-form-label">Doctor:</label>
                            <select name="doctores" id="doctores" class="form-control">
                                <?php if (isset($dataToView['data']['doc'])) {
                                    foreach ($dataToView['data']['doc'] as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"> <?php echo $p->doctor . ' <small>- ' . $p->patologia . '</small>'; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <label for="nombre-paciente" class="col-form-label">Fecha de la cita:</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                            <label for="nombre-paciente" class="col-form-label">Hora de la cita:</label>
                            <input type="time" id="hora" name="hora" min="07:00" max="17:00" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="guardar" name="guardar" value="cita">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="?c=citas&a=list" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Cita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre-paciente" class="col-form-label">paciente:</label>
                            <select name="epacientes" id="epacientes" class="form-control">
                                <?php if (isset($dataToView['data']['pacientes'])) {
                                    foreach ($dataToView['data']['pacientes'] as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"> <?php echo $p->paciente; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <label for="nombre-paciente" class="col-form-label">Doctor:</label>
                            <select name="edoctores" id="edoctores" class="form-control">
                                <?php if (isset($dataToView['data']['doc'])) {
                                    foreach ($dataToView['data']['doc'] as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"> <?php echo $p->doctor . ' <small>- ' . $p->patologia . '</small>'; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <label for="nombre-paciente" class="col-form-label">Fecha de la cita:</label>
                            <input type="date" class="form-control" id="efecha" name="efecha" required>
                            <input type="hidden" class="form-control" id="e_id" name="e_id" required>
                            <label for="nombre-paciente" class="col-form-label">Hora de la cita:</label>
                            <input type="time" id="ehora" name="ehora" min="07:00" max="17:00" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="editar" name="editar" value="cita">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>