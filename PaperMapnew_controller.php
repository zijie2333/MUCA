<?php

/**
* 
*/
class PaperMapnew extends CI_Controller
{
	public function index()
	{
        $topicID = $_GET['topicID'];
        $data['topicID'] = $topicID;
		$this->load->view('PaperMapnew.php',$data);
	}
    //clusterColor Part
    public function node()
    {
        $this->db_test = $this->load->database('acemap-test', TRUE);
        $paperID = $_GET['paperID'];
        $paperID = substr($paperID,3,strlen($paperID));
        $sql = "select TargetID as referencePaper from Edge_008FB4C8 where SourceID = ? UNION select SourceID as referencePaper from Edge_008FB4C8 where TargetID = ?  ;";
        $data["relatedPapers"] = $this->db_test->query($sql,array($paperID,$paperID ))->result_array();


        echo json_encode($data);
    }
    public function title()
    {
        $this->db_test = $this->load->database('mag2', TRUE);
        $paperID = $_GET['paperID'];
        $paperID = substr($paperID,3,strlen($paperID));
        $sql2 = "select OriginalPaperTitle as PaperTitle from Papers where PaperID = ?;";
        $data["PaperName"] = $this->db_test->query($sql2,array($paperID))->result_array();
        echo json_encode($data);
    }

    public function paperinfo()
    {
        $this->db_test = $this->load->database('mag2', TRUE);
        $paperID = $_GET['paperID'];
        $paperID = substr($paperID,3,strlen($paperID));
        //$sql3 = "select AuthorID  from PaperAuthorAffiliations where PaperID = ? order by AuthorSequenceNumber;";
        $sql3 = "Select Authors.AuthorName from
((select AuthorID from PaperAuthorAffiliations where PaperID = ? order by AuthorSequenceNumber limit 5) tab1
join Authors on tab1.AuthorID = Authors.AuthorID)";

        $data["AuthorName"] = $this->db_test->query($sql3,array($paperID))->result_array();

        echo json_encode($data);
    }
    public function citation()
    {
        $this->db_test = $this->load->database('acemap-test', TRUE);

        $topicID = $_GET['topicID'];
        $paperID = $_GET['paperID'];
        $paperID = substr($paperID,3,strlen($paperID));
        $sql4 = "select *  from citation_year where PaperID = ? and TopicID=?;";
        $data["Citation"] = $this->db_test->query($sql4,array($paperID,$topicID))->result_array();
        //$data["Year_citation"]=[$data["Citation"]["Year2008"],$data["Citation"]["Year2009"],$data["Citation"]["Year2010"],
        //    $data["Citation"]["Year2011"],$data["Citation"]["Year2012"],$data["Citation"]["Year2013"],$data["Citation"]["Year2014"],$data["Citation"]["Year2015"]];




        echo json_encode($data);
    }
}
