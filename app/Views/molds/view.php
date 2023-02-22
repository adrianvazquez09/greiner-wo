<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    GAM Molde <b><?php echo $mold['name'] ?></b><br>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Add a comment</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-sm-6">
                        ID del Molde: <b><?php echo $mold['id'] ?></b>
                    </div>
                    <div class="col-sm-6">
                        Ultima actualización: <b><?php echo date("Y-m-d") ?></b>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        Nombre: <b><?php echo $mold['name'] ?></b>
                    </div>
                    <div class="col-sm-6">
                        Descripción: <b><?php echo $mold['description'] ?></b>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        Contador Total: <b>12345</b>
                    </div>
                    <div class="col-sm-6">
                        Contador Mantenimiento: <b>421</b>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        Número de parte: <b><?php echo $mold['part_number'] ?></b>
                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Ordenes</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (!empty($orders)) { ?>
                            <?php for ($i = 0; $i < count($orders); $i++) { ?>
                                <a href="<?php echo base_url(); ?>/order/view/<?php echo $orders[$i]['id'] ?>" target="_blank   "> <i class="material-icons">description</i> Orden de trabajo #<?php echo $orders[$i]['id'] ?></a> (<?php echo $orders[$i]['date_added'] ?>) <br>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Agregar Shots al molde</h4>
                            </div>
                            <div class="col-sm-12">
                                Shots:
                                <input type="number" id="shots">
                                <button>Agregar</button>
                                <button>Resetear</button>
                            </div>
                            <div class="col-sm-12">
                                <h4>Agregar un comentario</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="<?php echo base_url(); ?>/mold/addComment/<?php echo $mold['id'] ?>">
                                    <div class="form-group" id="comments">
                                        <input id="order_id" name="order_id" type="hidden" value="<?php echo $mold['id'] ?>">
                                        <h2 class="card-inside-title">Comentarios</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea rows="3" name="comments" id="comments" class="form-control no-resize" placeholder="Escribe los comentarios del servicio..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="enviar" class="btn bg-blue btn-block btn-lg waves-effect">Agregar comentario</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Historial de la orden</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="body table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Información</th>
                                                <th>Usuario</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($comments); $i++) { ?>
                                                <tr>
                                                    <td><?php echo $comments[$i]['comment'] ?></td>
                                                    <td><?php echo $comments[$i]['user'] ?></td>
                                                    <td><?php echo $comments[$i]['date_added'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>