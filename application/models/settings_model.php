<?php
class settings_model extends CI_Model {

	function getCompanyInfo()
	{
        $this->db->where('id', $this->session->userdata('company_id'));
        return $this->db->get('settings');
	}

	// --------------------------------------------------------------------
    function get_current()
    {
        $this->db->where('id', $this->session->userdata('company_id'));
        $row = $this->db->get('settings');

        if ($row->num_rows() === 1)
        {
            return $row->row();
        }
        else
        {
            return FALSE;
        }
    }

	function get_setting($field,$id=1)
	{
        $this->db->where('id', $this->session->userdata('company_id'));
		$row = $this->db->get('settings');

		if ($row->num_rows() === 1)
		{
			return $row->row()->$field;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	function update_settings($data = array(), $id = 1)
	{
        $id = $this->session->userdata('company_id');

        if (count($data) == 0)
		{
			return TRUE; // no changes, just return a success
		}

		$this->db->where('id', $id);

		return $this->db->update('settings', $data);
	}

    function get_by_email ($email)
    {
        $this->db->where('primary_contact_email', $email);
        $row = $this->db->get('settings');
        return $row;
    }
    function add_setting($settingInfo)
    {


        $this->db->insert('settings', $settingInfo);

        return TRUE;
    }

}
?>