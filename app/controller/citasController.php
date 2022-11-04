<?php

use App\entities\_doctores;
use App\entities\_pacientes;
use App\entities\_patologias;
use App\entities\_citas;

class citasController
{
	public $page_title;
	public $view;

	public function __construct()
	{
		$this->view = 'list';
		$this->page_title = 'Home';
		
	}

	public function list(){
		$_pacientes = new _pacientes();
		$_doctores = new _doctores();
		$_citas = new _citas();

		if (isset($_POST['guardar'])) {
			if ($_POST['guardar'] == "cita") {
				$_citas::create(array(
					'id_paciente' => $_POST['pacientes'],
					'id_doctor' => $_POST['doctores'],
					'fecha' => $_POST['fecha'],
					'hora' => $_POST['hora'],
					'estatus' => 'En espera'
				));
				$data['mensaje'] = "Cita Creada";
			}
		}

		if (isset($_GET['i'])) {

			$e = $_citas::where('id', '=', $_GET['i'])->first();
			$e->estatus = 'Eliminado';
			$e->save();
			$data['mensaje'] = "Registro Eliminado";

		}

		if (isset($_GET['x'])) {

			$e = $_citas::where('id', '=', $_GET['x'])->first();
			$e->estatus = 'Atendido';
			$e->save();
			$data['mensaje'] = "Marcado como atendido";

		}

		if (isset($_POST['editar'])) {
			if ($_POST['editar'] == "cita") {
				$e = $_citas::where('id', '=', $_POST['e_id'])->first();
				$e->id_paciente = $_POST['epacientes'];
				$e->id_doctor = $_POST['edoctores'];
				$e->fecha = $_POST['efecha'];
				$e->hora = $_POST['ehora'];
				$e->save();
				$data['mensaje'] = "Modificado con exito";
			}
		}

		$data['pacientes'] = $_pacientes::where('estatus', '=', 0)->get();

		$data['doc'] = $_doctores::select('doctores.id', 'doctor', 'patologia', 'id_patologia')
			->join('patologias', 'doctores.id_patologia', '=', 'patologias.id')
			->where('doctores.estatus', '=', 0)
			->get();

		$data['citas'] = $_citas::select('citas.id', 'doctor', 'paciente', 'fecha', 'hora', 'citas.estatus','id_paciente','id_doctor')
			->join('doctores', 'citas.id_doctor', '=', 'doctores.id')
			->join('pacientes', 'citas.id_paciente', '=', 'pacientes.id')
			->orderBy('fecha','ASC')
			->where('citas.estatus', '!=', 'Eliminado')
			->get();

		return $data;
	}

	public function pacientes()
	{
		$this->view = 'pacientes';
		$this->page_title = 'Pacientes';

		$_pacientes = new _pacientes();

		if (isset($_POST['guardar'])) {
			if ($_POST['guardar'] == "pacientes") {
				$_pacientes::create(array(
					'paciente' => $_POST['nombre-paciente']
				));
				$data['mensaje'] = "Paciente Creado";
			}
		}

		if (isset($_POST['editar'])) {
			if ($_POST['editar'] == "pacientes") {
				$e = $_pacientes::where('id', '=', $_POST['e_id'])->first();
				$e->paciente = $_POST['e_nombre'];
				$e->save();
				$data['mensaje'] = "Modificado con exito";
			}
		}

		if (isset($_GET['i'])) {

			$e = $_pacientes::where('id', '=', $_GET['i'])->first();
			$e->estatus = 1;
			$e->save();
			$data['mensaje'] = "Registro Eliminado";
		}

		$data['pacientes'] = $_pacientes::where('estatus', '=', 0)->get();
		return $data;
	}

	public function doctores()
	{
		$this->view = 'doctores';
		$this->page_title = 'Doctores';
		$_doctores = new _doctores();
		$_patologias = new _patologias();
		$datos['patologias'] = $_patologias::where('estatus', '=', 0)->get();

		if (isset($_POST['guardar'])) {
			if ($_POST['guardar'] == "doctores") {
				$_doctores::create(array(
					'doctor' => $_POST['nombre-doctor'],
					'id_patologia' => $_POST['listPatologia']
				));
				$datos['mensaje'] = "Doctor Creado";
			}
		}

		if (isset($_POST['editar'])) {
			if ($_POST['editar'] == "doctores") {
				$e = $_doctores::where('id', '=', $_POST['e_id'])->first();
				$e->doctor = $_POST['e_nombre'];
				$e->id_patologia = $_POST['ePatologia'];
				$e->save();
				$datos['mensaje'] = "Modificado con exito";
			}
		}

		if (isset($_GET['i'])) {
			$e = $_doctores::where('id', '=', $_GET['i'])->first();
			$e->estatus = 1;
			$e->save();
		}

		$datos['doc'] = $_doctores::select('doctores.id', 'doctor', 'patologia', 'id_patologia')
			->join('patologias', 'doctores.id_patologia', '=', 'patologias.id')
			->where('doctores.estatus', '=', 0)
			->get();

		return $datos;
	}

	public function patologias()
	{
		$this->view = 'patologias';
		$this->page_title = 'Patologias';

		$_patologias = new _patologias();

		if (isset($_POST['guardar'])) {
			if ($_POST['guardar'] == "patologias") {
				$_patologias::create(array(
					'patologia' => $_POST['nombre-patologia']
				));
				$data['mensaje'] = "Patologias Creada";
			}
		}

		if (isset($_GET['i'])) {
			$e = $_patologias::where('id', '=', $_GET['i'])->first();
			$e->estatus = 1;
			$e->save();
		}

		if (isset($_POST['editar'])) {
			if ($_POST['editar'] == "patologias") {
				$e = $_patologias::where('id', '=', $_POST['e_id'])->first();
				$e->patologia = $_POST['e_nombre'];
				$e->save();
				$data['mensaje'] = "Modificado con exito";
			}
		}

		$data['pato'] = $_patologias::where('estatus', '=', 0)->get();

		return $data;
	}
}
