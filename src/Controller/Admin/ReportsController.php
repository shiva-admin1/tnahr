<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Admin\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
use TimeConversion;
class ReportsController extends AppController{
	
	use MailerAwareTrait;
public function dashboard()
    {
        $this->viewBuilder()->layout('layout');

        $osrquery2 = "SELECT count(DISTINCT osr.village_name) as villagecount,
						count(DISTINCT osr.taluk_name) as talukcount,
						count(DISTINCT osr.district_name) as districtcount,
						count(osr.id) as totalrecordcount
						from osr_records  as osr
                        where osr.is_active=1";

        $osrquery3 = "SELECT osr.district_name,osr.taluk_name, count(DISTINCT osr.village_name) as valcount
						from osr_records  as osr
                        where osr.is_active=1
						group by osr.taluk_name,osr.district_name order by osr.taluk_name";

        $fmbquery2 = "SELECT count(DISTINCT fmb.village_name) as villagecount,
						count(DISTINCT fmb.taluk_name) as talukcount,
						count(DISTINCT fmb.district_name) as districtcount,
						count(fmb.id) as totalrecordcount
						from fmb_records  as fmb
                        where fmb.is_active=1";

        $fmbquery3 = "SELECT fmb.district_name,fmb.taluk_name,
						count(DISTINCT fmb.village_name) as valcount
						from fmb_records  as fmb
                        where fmb.is_active=1
						group by fmb.taluk_name, fmb.district_name order by fmb.taluk_name";

        $ifrquery3 = "SELECT count(DISTINCT ifr.village_name) as villagecount,
						count(DISTINCT ifr.taluk_name) as talukcount,
						count(DISTINCT ifr.district_name) as districtcount,
						count(ifr.id) as totalrecordcount
						from ifr_records  as ifr
                        where ifr.is_active=1";

        $ifrquery2 = "SELECT ifr.district_name,ifr.taluk_name,
						count(DISTINCT ifr.village_name) as valcount
						from ifr_records  as ifr
                        where ifr.is_active=1
						group by ifr.taluk_name,ifr.district_name order by ifr.taluk_name";
						
	$ifrquerydept = "SELECT count(department_id) as department
						from indices_records  where is_active=1";

        // GO Type

        $goquery1 = "SELECT count(go.id) as totalgocount 
                    from go_records as go
                    where go.is_active=1";

        // GO Document Type

        $goquery2 = "SELECT doc.name, doc.id as doctyp, count(go.id) as valcount
						from go_records as go
						left join document_subtypes as doc   on doc.id = go.document_subtype_id
                        where go.is_active=1
						group by doc.name,doc.id";

        // Go Department Type

        $goquery3 = "SELECT gdept.name, gdept.id as dept, count(go.id) as valcount
						from go_records as go
						left join go_departments as gdept   on gdept.id = go.go_department_id
                        where go.is_active=1
						group by gdept.name, gdept.id";

        // BEIC Type

        $beicquery1 = "SELECT count(beic.id) as totalrecordcount
						from beic_records as beic
                        where beic.is_active=1";
        // BEIC Document Type

        $beicquery2 = "SELECT doc.name, doc.id as doctyp, count(beic.id) as valcount
						from beic_records as beic
						left join document_subtypes as doc  on doc.id = beic.document_subtype_id
                        where beic.is_active=1
						group by doc.name, doc.id";

        // Department Type

        $beicquery3 = "SELECT beic.department, count(beic.id) as valcount
						from beic_records as beic
                        where beic.is_active=1
						group by beic.department";

        // Gazettes Document Type

        $gazettesquery1 = "SELECT doc.name, doc.id as doctyp, count(gaz.id) as valcount
							from gazettes as gaz
							left join document_subtypes as doc   on doc.id = gaz.document_subtype_id
                            where gaz.is_active=1
							group by doc.name, doc.id";

        $gazettesquery2 = "SELECT count(gaz.id) as totalrecordcount
							from gazettes as gaz
							where gaz.is_active=1";

        // BP Type

        $bpquery1 = "SELECT doc.name, doc.id as doctyp, count(bp.id) as valcount
							from bp_records as bp
							left join document_subtypes as doc   on doc.id = bp.document_subtype_id
                            where bp.is_active=1
							group by doc.name, doc.id";

        $bpquery2 = "SELECT count(bp.id) as totalrecordcount
							from bp_records as bp
                            where bp.is_active=1";
        // Voter Type

        $voterquery3 = "SELECT count(voter.id) as totalrecordcount
                        from voter_records as voter
                        where voter.is_active=1";

        // Voter Document Type

        $voterquery1 = "SELECT doc.name, doc.id as doctyp, count(voter.id) as valcount
                        from voter_records as voter
                        left join document_subtypes as doc on doc.id = voter.document_subtype_id
                        where voter.is_active=1
                        group by doc.name, doc.id";

        // Constituency Name

        $voterquery2 = "SELECT voter.constituency_name, count(voter.id) as valcount
                        from voter_records as voter
                        where voter.is_active=1
                        group by voter.constituency_name";

        // Books Document Type

        $bookquery1 = "SELECT doc.name, doc.id as doctyp, count(book.id) as valcount
						from book_records as book
						left join document_subtypes as doc on doc.id = book.document_subtype_id
                        where book.is_active=1
						group by doc.name, doc.id";

        $bookquery4 = "SELECT count(book.id) as totalrecordcount
						from book_records as book
						where book.is_active=1";

        // author Name

        $bookquery2 = "SELECT count(DISTINCT book.author) as totalauthorcount
						from book_records as book
                        where book.is_active=1 AND book.author != '' ";

        // publisher_name Name

        $bookquery3 = "SELECT count(DISTINCT book.publisher_name) as totalpublishercount
						from book_records as book
                        where book.is_active=1 AND book.publisher_name != '' ";
						
		$preorder = "SELECT count(bp.id) as preordercount
							from old_records as bp
                            where bp.document_type_id=6";
		$goorder = "SELECT count(bp.id) as goordercount
							from old_records as bp
                            where bp.document_type_id=4";
		$gazorder = "SELECT count(bp.id) as gazettesordercount
							from old_records as bp
                            where bp.document_type_id=7";
		$bmgazorder = "SELECT count(bp.id) as bmgazettesordercount
							from old_records as bp
                            where bp.document_type_id=9";
							
		
                        

        $connection = ConnectionManager::get('default');

		$ifrallindice = $connection->execute($ifrquerydept)->fetchAll('assoc');  
		
        $osrtalukwiseVillagecount = $connection->execute($osrquery3)->fetchAll('assoc');
        $osrallcount = $connection->execute($osrquery2)->fetchAll('assoc');

        $fmbtalukwiseVillagecount = $connection->execute($fmbquery3)->fetchAll('assoc');
        $fmballcount = $connection->execute($fmbquery2)->fetchAll('assoc');

        $ifrtalukwiseVillagecount = $connection->execute($ifrquery2)->fetchAll('assoc');
        $ifrallcount = $connection->execute($ifrquery3)->fetchAll('assoc');

        $goallcount = $connection->execute($goquery1)->fetchAll('assoc');
        $godoctypcount = $connection->execute($goquery2)->fetchAll('assoc');
        $godeptcount = $connection->execute($goquery3)->fetchAll('assoc');

        $beictotalcount = $connection->execute($beicquery1)->fetchAll('assoc');
        $beicdoctypcount = $connection->execute($beicquery2)->fetchAll('assoc');
        $beicdeptcount = $connection->execute($beicquery3)->fetchAll('assoc');

        $gazettescount = $connection->execute($gazettesquery1)->fetchAll('assoc');
        $gazettestotalcount = $connection->execute($gazettesquery2)->fetchAll('assoc');

        $bpcount = $connection->execute($bpquery1)->fetchAll('assoc');
        $bptotalcount = $connection->execute($bpquery2)->fetchAll('assoc');
        //  echo "<pre>"; print_r($bpcount); exit();
        $votertotalcount = $connection->execute($voterquery3)->fetchAll('assoc');
        $votertypcount = $connection->execute($voterquery1)->fetchAll('assoc');
        $constituencycount = $connection->execute($voterquery2)->fetchAll('assoc');

        $bookcount = $connection->execute($bookquery1)->fetchAll('assoc');
        $authorcount = $connection->execute($bookquery2)->fetchAll('assoc');
        $publishercount = $connection->execute($bookquery3)->fetchAll('assoc');
        $booktotalcount = $connection->execute($bookquery4)->fetchAll('assoc');
		
		 $preordercount = $connection->execute($preorder)->fetchAll('assoc');
		 $goordercount = $connection->execute($goorder)->fetchAll('assoc');
		 $gazordercount = $connection->execute($gazorder)->fetchAll('assoc');
		 $bmgazordercount = $connection->execute($bmgazorder)->fetchAll('assoc');
		 $preordertypecount = $connection->execute("SELECT count(bp.id) as subtypecount	from document_subtypes as bp where bp.document_type_id=6 and bp.old=1")->fetchAll('assoc');
		 $goordertypecount = $connection->execute("SELECT count(bp.id) as subtypecount	from document_subtypes as bp where bp.document_type_id=4 and bp.old=1")->fetchAll('assoc');
		 $gazordertypecount = $connection->execute("SELECT count(bp.id) as subtypecount	from document_subtypes as bp where bp.document_type_id=7 and bp.old=1")->fetchAll('assoc');
		 $bmgazordertypecount = $connection->execute("SELECT count(bp.id) as subtypecount	from document_subtypes as bp where bp.document_type_id=9 and bp.old=1")->fetchAll('assoc');
       
        //print_r($beicdeptcount);exit();

        $this->set(compact('osrtalukwiseVillagecount', 'osrallcount', 'fmbtalukwiseVillagecount', 'fmballcount', 'ifrtalukwiseVillagecount', 'ifrallcount', 'goallcount', 'godoctypcount', 'godeptcount', 'beicdoctypcount','beictotalcount', 'beicdeptcount', 'gazettescount','gazettestotalcount', 'bpcount','bptotalcount','votertotalcount', 'votertypcount', 'constituencycount', 'bookcount','booktotalcount', 'authorcount', 'publishercount','ifrallindice','preordercount','goordercount','gazordercount','bmgazordercount','preordertypecount','goordertypecount','gazordertypecount','bmgazordertypecount'));
    }
    
    
   public function record_details($id = NULL,$type = NULL)
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('DocumentSubtypes');
        
        if($type == 1){
            $report_type  = $this->DocumentSubtypes->find('all')->where(['DocumentSubtypes.id'=>$id])->first()['document_type_id'];
        } elseif($type == 2) {
            $report_type  = 4;
        } elseif($type == 3) {
            $report_type  = 6;
        } elseif($type == 4) {
            $report_type  = 8;
        }

        if ($report_type == 4) { //GO Wise

                if($type ==1){
                    $subtype_id = $id;
                }elseif($type == 2){
                    $dept   = $id;
                }          
                $doc_subtyp_cond = ($subtype_id != '') ? " and gor.document_subtype_id = '" . $subtype_id . "'" : '';
                $dept_cond = ($dept != '') ? " and gor.go_department_id = '" . $dept . "'" : '';

                $connection = ConnectionManager::get('default');

                $goRecords = $connection->execute("select gor.*,dst.name as doc_subtype_name, god.name as go_dept_name
																FROM go_records as gor
																LEFT JOIN document_subtypes as dst on dst.id = gor.document_subtype_id
																LEFT JOIN go_departments as god on god.id = gor.go_department_id
																WHERE 1 $doc_subtyp_cond $dept_cond AND gor.is_active=1")->fetchAll('assoc');

                $this->set(compact('goRecords', 'documentSubtypes', 'report_type', 'subtype_id','dept'));

        } elseif ($report_type == 6) { //BEIC Wise

                if($type ==1){
                    $subtype_id = $id;
                }elseif($type == 3){
                    $dept   = $id;
                }   
                // print_r($dept); exit();  

                $doc_subtyp_cond = ($subtype_id != '') ? " and beicr.document_subtype_id = '" . $subtype_id . "'" : '';
                $dept_cond = ($dept != '') ? " and beicr.department = '" . $dept . "'" : '';

                $connection = ConnectionManager::get('default');
                $beicRecords = $connection->execute("select beicr.*,dst.name as doc_subtype_name
																FROM beic_records as beicr
																LEFT JOIN document_subtypes as dst on dst.id = beicr.document_subtype_id
																WHERE 1 $doc_subtyp_cond $dept_cond AND beicr.is_active=1")->fetchAll('assoc');

                $this->set(compact('beicRecords', 'report_type', 'subtype_id'));

            } elseif ($report_type == 8) { //Voter Records Wise

                if($type ==1){
                    $subtype_id   = $id;
                }elseif($type == 4){
                    $constituency = $id;
                }

                $con_cond = ($constituency != '') ? " and vr.constituency_name = '" . $constituency . "'" : '';
                $doc_subtyp_cond = ($subtype_id != '') ? " and vr.document_subtype_id = '" . $subtype_id . "'" : '';
                $connection = ConnectionManager::get('default');
                $voterRecords = $connection->execute("select vr.*,dst.name as doc_subtype_name
																FROM voter_records as vr
																LEFT JOIN document_subtypes as dst on dst.id = vr.document_subtype_id
																WHERE 1 $doc_subtyp_cond $con_cond AND vr.is_active=1")->fetchAll('assoc');

                $this->set(compact('voterRecords', 'documentSubtypes', 'vrtaluks', 'vrvillages', 'year', 'report_type', 'subtype_id'));

            } elseif ($report_type == 5) { //BP Wise

                $subtype_id = $id;

                $doc_subtyp_cond = ($subtype_id != '') ? " and bp.document_subtype_id = '" . $subtype_id . "'" : '';

                $connection = ConnectionManager::get('default');
                $bpRecords = $connection->execute("select bp.*,dst.name as doc_subtype_name
																FROM bp_records as bp
																LEFT JOIN document_subtypes as dst on dst.id = bp.document_subtype_id
																WHERE 1 $doc_subtyp_cond AND bp.is_active=1")->fetchAll('assoc');

                $this->set(compact('bpRecords', 'report_type', 'subtype_id'));

            } elseif ($report_type == 7) { //Gazettes Wise

                $subtype_id = $id;
                $doc_subtyp_cond = ($subtype_id != '') ? " and gz.document_subtype_id = '" . $subtype_id . "'" : '';

                $connection = ConnectionManager::get('default');
                $gazettes = $connection->execute("select gz.*,dst.name as doc_subtype_name
																FROM gazettes as gz
																LEFT JOIN document_subtypes as dst on dst.id = gz.document_subtype_id
																WHERE 1 $doc_subtyp_cond AND gz.is_active=1")->fetchAll('assoc');

                $this->set(compact('gazettes', 'report_type', 'subtype_id'));

            } elseif ($report_type == 9) { //BR Wise

                $subtype_id = $id;
                $brauthor = $this->request->data['brauthor'];
                $brpublisher = $this->request->data['brpublisher'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and br.document_subtype_id = '" . $subtype_id . "'" : '';
                $author_cond = ($brauthor != '') ? " and br.author = '" . $brauthor . "'" : '';
                $publisher_cond = ($brpublisher != '') ? " and br.publisher_name = '" . $brpublisher . "'" : '';
                $connection = ConnectionManager::get('default');
                $bookRecords = $connection->execute("select br.*,dst.name as doc_subtype_name
																FROM book_records as br
																LEFT JOIN document_subtypes as dst on dst.id = br.document_subtype_id
																WHERE 1 $doc_subtyp_cond $author_cond $publisher_cond AND br.is_active=1")->fetchAll('assoc');

                $this->set(compact('bookRecords', 'report_type', 'subtype_id', 'brauthor', 'brpublisher', 'authors', 'publishers'));

            }
                $this->set(compact('report_type','go_dept_type'));
    }

	
	
    public function rtidashboard()
    {

        $this->viewBuilder()->layout('layout');

        // Application Request Mode

        $rtiappreqmodequery2 = "SELECT rti.application_request_type, count(rti.id) as valcount
                                from rti_application_types as art
                                left join rti_request_records as rti on art.name = rti.application_request_type
                                group by rti.application_request_type";

        // Request Type
        $rtireqtypquery2 = "SELECT art.name as name, count(rti.id) as valcount,art.id as req_id
                            from rti_request_types as art
                            left join rti_request_records as rti on art.id = rti.rti_request_type_id
                            group by art.name,art.id";

        $rtireqtotquery = "SELECT count(rti.id) as totalreccount from rti_request_records as rti where rti.rti_request_type_id = 1";
        $normalreqtotquery = "SELECT count(rti.id) as totalreccount from rti_request_records as rti where rti.rti_request_type_id = 2";

        // Application Status Wise
        $rtistatus = "SELECT rti.application_status as name, count(rti.id) as valcount
                      from rti_request_records as rti
                      left join  statuses as sts on sts.name = rti.application_status
                      where rti.application_status != ''
                      group by rti.application_status";

        // Officer Level

        $rtiofficerlevel = "SELECT rol.name as name,rti.officer_level as off_level, count(rti.id) as valcount
                            from rti_request_records as rti
                            left join roles as rol on rol.id = rti.officer_level
                            group by rti.officer_level,rol.name";

        // Document Type Wise

        $rtidocttype = "SELECT doc.name as name, count(rti.id) as valcount,doc.id as doc_id
                        from rti_request_records as rti
                        left join document_types as doc   on doc.id = rti.document_type_id
                        group by doc.name,doc.id";

        // RTI Today Deadline Count
        $today = date('Y-m-d');
        $rtitodaydeadline = "SELECT count(rti.id) as valcount
                             from rti_request_records as rti
                             where rti.rti_request_type_id = 1 and rti.deadline_date = '" . $today . "'
                             group by rti.rti_request_type_id";

        // RTI Tomorrow Deadline Count
        $tomorrow = date('Y-m-d', strtotime("+1 days"));
        $rtitomorrowdeadline = "SELECT count(rti.id) as valcount
                                from rti_request_records as rti
                                where rti.rti_request_type_id = 1 and rti.deadline_date = '".$tomorrow."'
                                group by rti.rti_request_type_id";

        // RTI Next 30 Days Deadline Count
	   $today  = date('Y-m-d');
       $next30 = date('Y-m-d', strtotime("+30 days"));
       $rti30daysdeadline = "SELECT count(rti.id) as valcount
							from rti_request_records as rti
							where rti.rti_request_type_id = 1  and rti.deadline_date >= '" . $today . "'  and rti.deadline_date <= '".$next30."'
							";

        // BEIC Document Type

        $beicquery2 = "SELECT count(rti.id) as valcount
                       from rti_request_records as rti
                       where DATE_FORMAT(application_date, '%Y-%m') ='2020-03'
                       group by DATE_FORMAT(application_date, '%Y-%m')";

        $connection = ConnectionManager::get('default');

        $rtiappreqmodecount = $connection->execute($rtiappreqmodequery2)->fetchAll('assoc');
        $rtireqtypcount     = $connection->execute($rtireqtypquery2)->fetchAll('assoc');
        $rtitotalcount      = $connection->execute($rtireqtotquery)->fetchAll('assoc');
        $normaltotalcount   = $connection->execute($normalreqtotquery)->fetchAll('assoc');
       
        $rtistatuscount = $connection->execute($rtistatus)->fetchAll('assoc');
        $rtiofficerlevelcount = $connection->execute($rtiofficerlevel)->fetchAll('assoc');

        $rtidocttypecount = $connection->execute($rtidocttype)->fetchAll('assoc');
        $rtitodaydeadlinecount    = $connection->execute($rtitodaydeadline)->fetchAll('assoc');
        $rtitomorrowdeadlinecount = $connection->execute($rtitomorrowdeadline)->fetchAll('assoc');
        $rti30daysdeadlinecount   = $connection->execute($rti30daysdeadline)->fetchAll('assoc');
        

        $this->set(compact('rtiappreqmodecount', 'rtitotalcount', 'rtireqtypcount', 'rtistatuscount', 'rtiofficerlevelcount', 'rtidocttypecount', 'rtitodaydeadlinecount', 'rtitomorrowdeadlinecount','rti30daysdeadlinecount','normaltotalcount'));
    }
	
	
	
	public function dashboard_old()
    {
		
		$this->viewBuilder()->layout('layout');
		
		
		$osrquery2 = "SELECT count(DISTINCT osr.village_name) as villagecount,
						count(DISTINCT osr.taluk_name) as talukcount,
						count(DISTINCT osr.district_name) as districtcount,
						count(osr.id) as totalrecordcount
						from osr_records  as osr";


		$osrquery3 = "SELECT osr.district_name,osr.taluk_name, count(DISTINCT osr.village_name) as valcount
						from osr_records  as osr 
						group by osr.taluk_name order by osr.taluk_name";
		
		
		$fmbquery2 = "SELECT count(DISTINCT fmb.village_name) as villagecount,
						count(DISTINCT fmb.taluk_name) as talukcount,
						count(DISTINCT fmb.district_name) as districtcount,
						count(fmb.id) as totalrecordcount
						from fmb_records  as fmb";


		$fmbquery3 = "SELECT fmb.district_name,fmb.taluk_name, 
						count(DISTINCT fmb.village_name) as valcount
						from fmb_records  as fmb 
						group by fmb.taluk_name order by fmb.taluk_name";
						
						
						


		$ifrquery3 = "SELECT count(DISTINCT ifr.village_name) as villagecount,
						count(DISTINCT ifr.taluk_name) as talukcount,
						count(DISTINCT ifr.district_name) as districtcount,
						count(ifr.id) as totalrecordcount
						from ifr_records  as ifr";

		$ifrquery2 = "SELECT ifr.district_name,ifr.taluk_name, 
						count(DISTINCT ifr.village_name) as valcount
						from ifr_records  as ifr 
						group by ifr.taluk_name order by ifr.taluk_name";

				
		// GO Document Type		

		$goquery2 = "select doc.name, count(go.id) as valcount
						from go_records as go
						left join document_subtypes as doc   on doc.id = go.document_subtype_id
						group by doc.name";


		// Go Department Type

		$goquery3 = "select gdept.name, count(go.id) as valcount
						from go_records as go
						left join go_departments as gdept   on gdept.id = go.go_department_id
						group by gdept.name";

		
		// BEIC Document Type

		$beicquery2 = "select doc.name, count(beic.id) as valcount
						from beic_records as beic
						left join document_subtypes as doc   on doc.id = beic.document_subtype_id
						group by doc.name";

		// Department Type

		$beicquery3 = "select beic.department, count(beic.id) as valcount
						from beic_records as beic
						group by beic.department";
						
		// Gazettes Document Type

		$gazettesquery1 ="select doc.name, count(gaz.id) as valcount
							from gazettes as gaz
							left join document_subtypes as doc   on doc.id = gaz.document_subtype_id
							group by doc.name";
		
		$bpquery1 = "select doc.name, count(bp.id) as valcount
							from bp_records as bp
							left join document_subtypes as doc   on doc.id = bp.document_subtype_id
							group by doc.name";
		// Voter Document Type

		$voterquery1 = "select doc.name, count(voter.id) as valcount
					from 
					voter_records as voter
					left join document_subtypes as doc   on doc.id = voter.document_subtype_id
					group by doc.name";


					// Constituency Name

		$voterquery2 = "select voter.constituency_name, count(voter.id) as valcount
					from 
					voter_records as voter
					group by voter.constituency_name";
					
										
					// Books Document Type

		$bookquery1 = "select doc.name, count(book.id) as valcount
						from book_records as book
						left join document_subtypes as doc   on doc.id = book.document_subtype_id
						group by doc.name";


					// author Name

		$bookquery2 = "select book.author, count(book.id) as valcount
						from book_records as book
						group by book.author";

					// publisher_name Name

		$bookquery3 = "select book.publisher_name, count(book.id) as valcount
						from book_records as book
						group by book.publisher_name";


		$connection 					= ConnectionManager::get('default');
		
		$osrtalukwiseVillagecount 		= $connection->execute($osrquery3)->fetchAll('assoc');
		$osrallcount 					= $connection->execute($osrquery2)->fetchAll('assoc');
		
		$fmbtalukwiseVillagecount 		= $connection->execute($fmbquery3)->fetchAll('assoc');
		$fmballcount 					= $connection->execute($fmbquery2)->fetchAll('assoc');
		
		$ifrtalukwiseVillagecount 		= $connection->execute($ifrquery2)->fetchAll('assoc');
		$ifrallcount 					= $connection->execute($ifrquery3)->fetchAll('assoc');
		
		$godoctypcount 					= $connection->execute($goquery2)->fetchAll('assoc');
		$godeptcount 					= $connection->execute($goquery3)->fetchAll('assoc');
		
		$beicdoctypcount 				= $connection->execute($beicquery2)->fetchAll('assoc');
		$beicdeptcount 					= $connection->execute($beicquery3)->fetchAll('assoc');
		
		$gazettescount 					= $connection->execute($gazettesquery1)->fetchAll('assoc');
		
		$bpcount 						= $connection->execute($bpquery1)->fetchAll('assoc');
		
		$votertypcount 					= $connection->execute($voterquery1)->fetchAll('assoc');
		$constituencycount 				= $connection->execute($voterquery2)->fetchAll('assoc');
		
		$bookcount 						= $connection->execute($bookquery1)->fetchAll('assoc');
		$authorcount 					= $connection->execute($bookquery2)->fetchAll('assoc');
		$publishercount 				= $connection->execute($bookquery3)->fetchAll('assoc');
		
		
		


		//print_r($beicdeptcount);exit();
			
        $this->set(compact('osrtalukwiseVillagecount','osrallcount','fmbtalukwiseVillagecount','fmballcount','ifrtalukwiseVillagecount','ifrallcount','godoctypcount','godeptcount','beicdoctypcount','beicdeptcount','gazettescount','bpcount','votertypcount','constituencycount','bookcount','authorcount','publishercount'));
    }
	
	public function customize_userentry_report()
	{
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentTypes');
		
		
		if ($this->request->is(['post'])) { 
			
			//print_r($this->request->getdata()); exit(); 
			$connection = ConnectionManager::get('default');
			$report_type = $this->request->data['report_type'];
			
			$conditions  		 =	"";
		
			if($report_type ==1){ // FMB Wise
				   
				$reportHead = "FMB Records";
		
			
				$query		= "SELECT adu.name, count(fmb.id) as valcount, 
								sum(case when fmb.updated_by is not null then 1 else 0 end ) as updatedcount
								from fmb_records  as fmb
								left join admin_users as adu on adu.id = fmb.created_by
								where adu.role_id = 2
								group by adu.name, fmb.created_by";

				$records        = $connection->execute($query)->fetchAll('assoc');
		        
			
			}elseif($report_type ==2){ //OSR Wise
				
                $reportHead = "OSR Records";
				
				$query		= "SELECT adu.name, count(osr.id) as valcount, 
								sum(case when osr.updated_by is not null then 1 else 0 end ) as updatedcount
								from osr_records  as osr
								left join admin_users as adu on adu.id = osr.created_by
								where adu.role_id = 2
								group by adu.name, osr.created_by";
				
				$records        = $connection->execute($query)->fetchAll('assoc');
			
			}elseif($report_type ==3){ //IFR Wise
				
                $reportHead = "IFR Records";
				$query		= "SELECT adu.name, count(ifr.id) as valcount, 
								sum(case when ifr.updated_by is not null then 1 else 0 end ) as updatedcount
								from ifr_records  as ifr
								left join admin_users as adu on adu.id = ifr.created_by
								where adu.role_id = 2
								group by adu.name, ifr.created_by";
				
				$records        = $connection->execute($query)->fetchAll('assoc');
					
			}elseif($report_type ==4){ //GO Wise
                
				$reportHead = "GO Records";
				 	
				$query		= "SELECT adu.name, count(go.id) as valcount, 
								sum(case when go.updated_by is not null then 1 else 0 end ) as updatedcount
								from go_records as go
								left join admin_users as adu on adu.id = go.created_by
								where adu.role_id = 2
								group by adu.name, go.created_by";

				$records        = $connection->execute($query)->fetchAll('assoc');
				
			}elseif($report_type ==5){ //BP Wise
				
                $reportHead = "BP Records";
				$query		= "SELECT adu.name, count(bp.id) as valcount, 
								sum(case when bp.updated_by is not null then 1 else 0 end ) as updatedcount
								from bp_records  as bp
								left join admin_users as adu on adu.id = bp.created_by
								where adu.role_id = 2
								group by adu.name, bp.created_by";
				    
				$records        = $connection->execute($query)->fetchAll('assoc');

			}elseif($report_type ==6){ //BEIC Wise
				
                $reportHead = "BEIC Records";

				$query		= "SELECT adu.name, count(beic.id) as valcount, 
								sum(case when beic.updated_by is not null then 1 else 0 end ) as updatedcount
								from beic_records as beic
								left join admin_users as adu on adu.id = beic.created_by
								where adu.role_id = 2
								group by adu.name, beic.created_by";
				$records        = $connection->execute($query)->fetchAll('assoc');

		    }elseif($report_type ==7){ //Gazettes Wise
				
                $reportHead = "Gazettes";
				$query		= "SELECT adu.name, count(gaz.id) as valcount, 
								sum(case when gaz.updated_by is not null then 1 else 0 end ) as updatedcount
								from gazettes as gaz
								left join admin_users as adu on adu.id = gaz.created_by
								where adu.role_id = 2
								group by adu.name, gaz.created_by";
				

				$records        = $connection->execute($query)->fetchAll('assoc');

	    	}elseif($report_type ==8){ //Voter Records Wise
				
                $reportHead = "Voter Records";
				
				$query		= "SELECT adu.name, count(voter.id) as valcount, 
								sum(case when voter.updated_by is not null then 1 else 0 end ) as updatedcount
								from voter_records as voter
								left join admin_users as adu on adu.id = voter.created_by
								where adu.role_id = 2
								group by adu.name, voter.created_by";
											
				$records        = $connection->execute($query)->fetchAll('assoc');
				
	    	}elseif($report_type ==9){ //BR Wise
				
                $reportHead = "Book Records";

				$query		= "SELECT adu.name, count(book.id) as valcount, 
								sum(case when book.updated_by is not null then 1 else 0 end ) as updatedcount
								from book_records as book
								left join admin_users as adu on adu.id = book.created_by
								where adu.role_id = 2
								group by adu.name, book.created_by";
				$records        = $connection->execute($query)->fetchAll('assoc');
				
		 	}
			$this->set(compact('report_type','records','reportHead'));
				
		}
		$reportTypes    		= $this->DocumentTypes->find('list', array('order'=>'DocumentTypes.id ASC'))->where(['DocumentTypes.is_active' => 1])->toArray();
		
		$this->set(compact('reportTypes'));
	}
	
	
	public function customize_detail_report()
	{
		$this->viewBuilder()->layout('layout');
		$this->LoadModel('DocumentTypes');
		$this->LoadModel('OsrRecords');
		$this->LoadModel('FmbRecords');
		$this->LoadModel('IfrRecords');
		$this->LoadModel('GoRecords');
		$this->LoadModel('BpRecords');
		$this->LoadModel('BeicRecords');
		$this->LoadModel('Gazettes');
		$this->LoadModel('VoterRecords');
		$this->LoadModel('BookRecords');
		$this->LoadModel('GoDepartments');
		
		$reportTypes    		= $this->DocumentTypes->find('list', array('order'=>'DocumentTypes.id ASC'))->where(['DocumentTypes.is_active' => 1])->order(['orderflag ASC'])->toArray();
		$osrdistricts           = $this->OsrRecords->find('list',['keyField'=>'district_name','valueField'=>'district_name'])->group(['OsrRecords.district_name'])->toArray();
		$fmbdistricts           = $this->FmbRecords->find('list',['keyField'=>'district_name','valueField'=>'district_name'])->group(['FmbRecords.district_name'])->toArray();
		$ifrdistricts           = $this->IfrRecords->find('list',['keyField'=>'district_name','valueField'=>'district_name'])->group(['IfrRecords.district_name'])->toArray();
		$goDepartments          = $this->GoDepartments->find('list', array('order'=>'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
		$beicdepartments        = $this->BeicRecords->find('list',['keyField'=>'department','valueField'=>'department'])->group(['BeicRecords.document_subtype_id'])->toArray();
		$vrconstituencys        = $this->VoterRecords->find('list',['keyField'=>'constituency_name','valueField'=>'constituency_name'])->group(['VoterRecords.constituency_name'])->toArray();
		$vryears                = $this->VoterRecords->find('list',['keyField'=>'record_year','valueField'=>'record_year'])->group(['VoterRecords.record_year'])->toArray();
		$authors                = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->where(['BookRecords.document_subtype_id'=>$subtype_id])->group(['BookRecords.author'])->toArray();
		$publishers             = $this->BookRecords->find('list',['keyField'=>'publisher_name','valueField'=>'publisher_name'])->where(['BookRecords.author'=>$brauthor])->group(['BookRecords.publisher_name'])->toArray();
     
		
		//echo "<pre>"; print_r($constituencys); exit();
		
		if ($this->request->is(['post'])) { //print_r($this->request->data()); exit(); 
			$connection = ConnectionManager::get('default');
			$report_type = $this->request->data['report_type'];
			
			$conditions  		 =	"";
		
			if($report_type ==1){ //FMB Wise
				   
				$reportHead = "FMB Records";

				
					$subtype_id          = $this->request->data['document_subtype_id'];
					$district            = $this->request->data['fmb_district'];
					$taluk               = $this->request->data['fmb_taluk'];
					$village             = $this->request->data['fmb_village'];

					$doc_subtyp_cond     = ($subtype_id != '')?" and fmb.document_subtype_id = '".$subtype_id."'":'';
					$dist_cond           = ($district != '')?" and fmb.district_name = '".$district."'":'';
					$taluk_cond		     = ($taluk != '')?" and fmb.taluk_name = '".$taluk."'":'';
					$vil_cond  		     = ($village != '')?" and fmb.village_name = '".$village."'":'';
					$connection          = ConnectionManager::get('default');
					$fmbRecords          = $connection->execute("select fmb.*,dst.name as doc_subtyp_name
																FROM fmb_records as fmb
																LEFT JOIN document_subtypes as dst on dst.id = fmb.document_subtype_id
																WHERE 1 $dist_cond $taluk_cond $vil_cond $doc_subtyp_cond ")->fetchAll('assoc');
					
					$fmbtaluks          = $this->FmbRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['FmbRecords.district_name'=>$district])->group(['FmbRecords.taluk_name'])->toArray();
					//print_r($fmbtaluks); exit();
					$fmbvillages        = $this->FmbRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['FmbRecords.taluk_name'=>$taluk])->group(['FmbRecords.village_name'])->toArray();
				 
				$this->set(compact('fmbRecords','fmbtaluks','fmbvillages','subtype_id'));
		
				
			
			}elseif($report_type ==2){ //OSR Wise
				
                $reportHead = "OSR Records";
				
					$subtype_id        = $this->request->data['document_subtype_id'];	
					$district          = $this->request->data['osr_district'];
					$taluk             = $this->request->data['osr_taluk'];
					$village           = $this->request->data['osr_village'];

					$doc_subtyp_cond   = ($subtype_id != '')?" and osr.document_subtype_id = '".$subtype_id."'":'';
					$dist_cond         = ($district != '')?" and osr.district_name = '".$district."'":'';
					$taluk_cond		   = ($taluk != '')?" and osr.taluk_name = '".$taluk."'":'';
					$vil_cond  		   = ($village != '')?" and osr.village_name = '".$village."'":'';
					$connection        = ConnectionManager::get('default');
					$osrRecords        = $connection->execute("select osr.*,dst.name as doc_subtyp_name
																FROM osr_records as osr
																LEFT JOIN document_subtypes as dst on dst.id = osr.document_subtype_id
																WHERE 1 $dist_cond $taluk_cond $vil_cond $doc_subtyp_cond")->fetchAll('assoc');
		        
					$osrtaluks         = $this->OsrRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['OsrRecords.district_name'=>$district])->group(['OsrRecords.taluk_name'])->toArray();
					$osrvillages       = $this->OsrRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['OsrRecords.taluk_name'=>$taluk])->group(['OsrRecords.village_name'])->toArray();
			
				$this->set(compact('osrRecords','osrtaluks','osrvillages','report_type','subtype_id'));
			
			}elseif($report_type ==3){ //IFR Wise
				
                $reportHead = "IFR Records";
				
					$district          = $this->request->data['ifr_district'];
					$taluk             = $this->request->data['ifr_taluk'];
					$village           = $this->request->data['ifr_village'];  

					$dist_cond         = ($district != '')?" and ifr.district_name = '".$district."'":'';
					$taluk_cond		   = ($taluk != '')?" and ifr.taluk_name = '".$taluk."'":'';
					$vil_cond  		   = ($village != '')?" and ifr.village_name = '".$village."'":'';
					$connection        = ConnectionManager::get('default');
					$ifrRecords        = $connection->execute("select ifr.*
																FROM ifr_records as ifr
																WHERE 1 $dist_cond $taluk_cond $vil_cond")->fetchAll('assoc');
					
					$ifrtaluks         = $this->IfrRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['IfrRecords.district_name'=>$district])->group(['IfrRecords.taluk_name'])->toArray();
					$ifrvillages       = $this->IfrRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['IfrRecords.taluk_name'=>$taluk])->group(['IfrRecords.village_name'])->toArray();
				   
				
				$this->set(compact('ifrRecords','ifrtaluks','ifrvillages','report_type'));
					
			}elseif($report_type ==4){ //GO Wise
                
				$reportHead = "GO Records";
				 	
					$subtype_id        = $this->request->data['document_subtype_id'];
					$goRecords 		   = $this->GoRecords->find('all', ['contain' => [ 'DocumentSubtypes','GoDepartments']])->where(['GoRecords.is_active'=>1,'GoRecords.document_subtype_id'=>$subtype_id,'GoRecords.go_department_id'=>$go_id])->toArray();
					$dept              = $this->request->data['go_department_id'];

					$doc_subtyp_cond   = ($subtype_id != '')?" and gor.document_subtype_id = '".$subtype_id."'":'';
					$dept_cond         = ($dept != '')?" and gor.go_department_id = '".$dept."'":'';  

					$connection        = ConnectionManager::get('default');
					$goRecords         = $connection->execute("select gor.*,dst.name as doc_subtype_name, god.name as go_dept_name
																FROM go_records as gor
																LEFT JOIN document_subtypes as dst on dst.id = gor.document_subtype_id
																LEFT JOIN go_departments as god on god.id = gor.go_department_id
																WHERE 1 $doc_subtyp_cond $dept_cond ")->fetchAll('assoc');
				
				$this->set(compact('goRecords','documentSubtypes','report_type','subtype_id'));
				
			}elseif($report_type ==5){ //BP Wise
				
                $reportHead = "BP Records";
					 
					$subtype_id        = $this->request->data['document_subtype_id'];
					$bpRecords 		   = $this->BpRecords->find('all', ['contain' => [ 'DocumentSubtypes']])->where(['BpRecords.is_active'=>1,'BpRecords.document_subtype_id'=>$subtype_id])->toArray();
                    
				$this->set(compact('bpRecords','report_type','subtype_id'));

			}elseif($report_type ==6){ //BEIC Wise
				
                $reportHead = "BEIC Records";

					$subtype_id        = $this->request->data['document_subtype_id'];
					$dept              = $this->request->data['beicdepartment'];

					$doc_subtyp_cond   = ($subtype_id != '')?" and beicr.document_subtype_id = '".$subtype_id."'":'';
					$dept_cond         = ($dept != '')?" and beicr.department = '".$dept."'":'';

					$connection        = ConnectionManager::get('default');
					$beicRecords       = $connection->execute("select beicr.*,dst.name as doc_subtype_name
																FROM beic_records as beicr
																LEFT JOIN document_subtypes as dst on dst.id = beicr.document_subtype_id
																WHERE 1 $doc_subtyp_cond $dept_cond ")->fetchAll('assoc');

				$this->set(compact('beicRecords','report_type','subtype_id'));

		    }elseif($report_type ==7){ //Gazettes Wise
				
                $reportHead = "Gazettes";

					$subtype_id       = $this->request->data['document_subtype_id'];
					$gazettes 		  = $this->Gazettes->find('all', ['contain' => [ 'DocumentSubtypes']])->where(['Gazettes.is_active'=>1,'Gazettes.document_subtype_id'=>$subtype_id])->toArray();


				$this->set(compact('gazettes','report_type','subtype_id'));

	    	}elseif($report_type ==8){ //Voter Records Wise
				
                $reportHead = "Voter Records";

					$constituency      = $this->request->data['constituency'];
					$district          = $this->request->data['district'];
					$taluk             = $this->request->data['taluk'];
					$village           = $this->request->data['village'];
					$subtype_id        = $this->request->data['document_subtype_id'];
					$year              = $this->request->data['year'];
							
					$con_cond          = ($constituency != '')?" and vr.constituency_name = '".$constituency."'":'';
					$dist_cond         = ($district != '')?" and vr.district_name = '".$district."'":'';
					$taluk_cond		   = ($taluk != '')?" and vr.taluk_name = '".$taluk."'":'';
					$vil_cond  		   = ($village != '')?" and vr.village_name = '".$village."'":'';
					$doc_subtyp_cond   = ($subtype_id != '')?" and vr.document_subtype_id = '".$subtype_id."'":'';
					$year_cond 		   = ($year != '')?" and vr.record_year = '".$year."'":'';
					$connection        = ConnectionManager::get('default');
					$voterRecords      = $connection->execute("select vr.*,dst.name as doc_subtype_name
																FROM voter_records as vr
																LEFT JOIN document_subtypes as dst on dst.id = vr.document_subtype_id
																WHERE 1 $con_cond  $dist_cond $taluk_cond $vil_cond $doc_subtyp_cond $year_cond ")->fetchAll('assoc');

					$vrtaluks          = $this->VoterRecords->find('list',['keyField'=>'taluk_name','valueField'=>'taluk_name'])->where(['VoterRecords.district_name'=>$district])->group(['VoterRecords.taluk_name'])->toArray();
					$vrvillages        = $this->VoterRecords->find('list',['keyField'=>'village_name','valueField'=>'village_name'])->where(['VoterRecords.taluk_name'=>$taluk])->group(['VoterRecords.village_name'])->toArray();
															
				$this->set(compact('voterRecords','documentSubtypes','vrtaluks','vrvillages','year','report_type','subtype_id'));
				
	    	}elseif($report_type ==9){ //BR Wise
				
                $reportHead = "Book Records";

					$subtype_id        = $this->request->data['document_subtype_id'];
					$brauthor          = $this->request->data['brauthor'];
					$brpublisher       = $this->request->data['brpublisher'];

					$doc_subtyp_cond   = ($subtype_id != '')?" and br.document_subtype_id = '".$subtype_id."'":'';
					$author_cond  	   = ($brauthor != '')?" and br.author = '".$brauthor."'":'';
					$publisher_cond    = ($brpublisher != '')?" and br.publisher_name = '".$brpublisher."'":'';
					$connection        = ConnectionManager::get('default');
					$bookRecords       = $connection->execute("select br.*,dst.name as doc_subtype_name
																FROM book_records as br
																LEFT JOIN document_subtypes as dst on dst.id = br.document_subtype_id
																WHERE 1 $doc_subtyp_cond $author_cond $publisher_cond ")->fetchAll('assoc');
					
                    $authors           = $this->BookRecords->find('list',['keyField'=>'author','valueField'=>'author'])->where(['BookRecords.document_subtype_id'=>$subtype_id])->group(['BookRecords.author'])->toArray();
		 			$publishers        = $this->BookRecords->find('list',['keyField'=>'publisher_name','valueField'=>'publisher_name'])->where(['BookRecords.author'=>$brauthor])->group(['BookRecords.publisher_name'])->toArray();

				$this->set(compact('bookRecords','report_type','subtype_id','brauthor','brpublisher','authors','publishers'));
				
		 	}
		

			$this->set(compact('report_type'));
		
				
		}
		
		$this->set(compact('reportTypes','osrdistricts','fmbdistricts','ifrdistricts','goDepartments','beicdepartments','vrconstituencys','vryears','authors','publishers'));
	}
	
	
  
    public function record_count_report()
    {
        $this->viewBuilder()->layout('layout');
        $this->LoadModel('DocumentTypes');
        $this->LoadModel('ReportTypes');
        $this->LoadModel('OsrRecords');
        $this->LoadModel('FmbRecords');
        $this->LoadModel('IfrRecords');
        $this->LoadModel('GoRecords');
        $this->LoadModel('BpRecords');
        $this->LoadModel('BeicRecords');
        $this->LoadModel('Gazettes');
        $this->LoadModel('VoterRecords');
        $this->LoadModel('BookRecords');
        $this->LoadModel('GoDepartments');

        $recordTypes = $this->DocumentTypes->find('list', array('order' => 'DocumentTypes.id ASC'))->where(['DocumentTypes.is_active' => 1])->toArray();
        $osrdistricts = $this->OsrRecords->find('list', ['keyField' => 'district_name', 'valueField' => 'district_name'])->group(['OsrRecords.district_name'])->toArray();
        $fmbdistricts = $this->FmbRecords->find('list', ['keyField' => 'district_name', 'valueField' => 'district_name'])->group(['FmbRecords.district_name'])->toArray();
        $ifrdistricts = $this->IfrRecords->find('list', ['keyField' => 'district_name', 'valueField' => 'district_name'])->group(['IfrRecords.district_name'])->toArray();
        $vrdistricts = $this->VoterRecords->find('list', ['keyField' => 'district_name', 'valueField' => 'district_name'])->group(['VoterRecords.district_name'])->toArray();
        $goDepartments = $this->GoDepartments->find('list', array('order' => 'GoDepartments.name ASC'))->where(['GoDepartments.is_active' => 1])->toArray();
        $beicdepartments = $this->BeicRecords->find('list', ['keyField' => 'department', 'valueField' => 'department'])->group(['BeicRecords.document_subtype_id'])->toArray();
        $vrconstituencys = $this->VoterRecords->find('list', ['keyField' => 'constituency_name', 'valueField' => 'constituency_name'])->group(['VoterRecords.constituency_name'])->toArray();
        $vryears = $this->VoterRecords->find('list', ['keyField' => 'record_year', 'valueField' => 'record_year'])->group(['VoterRecords.record_year'])->toArray();
        $authors = $this->BookRecords->find('list', ['keyField' => 'author', 'valueField' => 'author'])->where(['BookRecords.document_subtype_id' => $subtype_id])->group(['BookRecords.author'])->toArray();
        $publishers = $this->BookRecords->find('list', ['keyField' => 'publisher_name', 'valueField' => 'publisher_name'])->where(['BookRecords.author' => $brauthor])->group(['BookRecords.publisher_name'])->toArray();

        //echo "<pre>"; print_r($constituencys); exit();

        if ($this->request->is(['post'])) { // print_r($this->request->data()); exit();
            $connection = ConnectionManager::get('default');
            $record_type = $this->request->data['record_type'];
            $report_type = $this->request->data['report_type'];
            $record_name = $this->DocumentTypes->find('all')->where(['DocumentTypes.id' => $record_type])->first()['name'];
            $report_name = $this->ReportTypes->find('all')->where(['ReportTypes.id' => $report_type])->first()['name'];
            $reportTypes = $this->ReportTypes->find('list', array('order' => 'ReportTypes.order_flag ASC'))->where(['ReportTypes.is_active' => 1, 'ReportTypes.document_type_id' => $record_type])->toArray();

            $conditions = "";

            if ($record_type == 1) { //FMB Wise

                $reportHead = "FMB Records";

                $report_type = $this->request->data['report_type'];
                $subtype_id  = $this->request->data['document_subtype_id'];
                $district    = $this->request->data['fmb_district'];
                $taluk       = $this->request->data['fmb_taluk'];
                $village     = $this->request->data['fmb_village'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and fmb.document_subtype_id = '" . $subtype_id . "'" : '';
                $dist_cond       = ($district != '') ? " and fmb.district_name = '" . $district . "'" : '';
                $taluk_cond      = ($taluk != '') ? " and fmb.taluk_name = '" . $taluk . "'" : '';
                $vil_cond        = ($village != '') ? " and fmb.village_name = '" . $village . "'" : '';
                $connection      = ConnectionManager::get('default');

                 if ($report_type == 13) {

                    $fmbdoctyp      = $connection->execute("SELECT doc.name as fmbdoctypname, count(fmb.id) as valcount
                                                            from document_subtypes as doc
                                                            left join fmb_records as fmb on doc.id = fmb.document_subtype_id
                                                            where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
                                                            group by doc.name")->fetchAll('assoc');
                } else if ($report_type == 14) {

                    $fmbdistrict    = $connection->execute("SELECT fmb.district_name as fmbdistname, count(fmb.id) as valcount
                                                            from fmb_records as fmb
                                                            group by fmb.district_name")->fetchAll('assoc');
                } else if ($report_type == 15) {

                    $fmbtaluk       = $connection->execute("SELECT fmb.district_name as fmbdistname, fmb.taluk_name as fmbtalukname, count(fmb.id) as valcount
                                                            from fmb_records as fmb
                                                            where 1 $dist_cond
                                                            group by fmb.taluk_name")->fetchAll('assoc');
                } else if ($report_type == 16) {

                    $fmbvillage     = $connection->execute("SELECT fmb.district_name as fmbdistname, fmb.taluk_name as fmbtalukname, fmb.village_name as fmbvillagename, count(fmb.id) as valcount
                                                            from fmb_records as fmb
                                                            where 1 $dist_cond $taluk_cond
                                                            group by fmb.village_name")->fetchAll('assoc');    
            }
              if($district != ''){
               
              $fmbtaluks = $this->FmbRecords->find('list', ['keyField' => 'taluk_name', 'valueField' => 'taluk_name'])->where(['FmbRecords.district_name' => $district])->group(['FmbRecords.taluk_name'])->toArray();
                //$fmbvillages = $this->FmbRecords->find('list', ['keyField' => 'village_name', 'valueField' => 'village_name'])->where(['FmbRecords.taluk_name' => $taluk])->group(['FmbRecords.village_name'])->toArray();
              }  
                $this->set(compact('fmbdoctyp','fmbdistrict','fmbtaluk','fmbvillage','fmbtaluks', 'fmbvillages','report_type','subtype_id'));

            } elseif ($record_type == 2) { //OSR Wise

                $reportHead = "OSR Records";

                $report_type = $this->request->data['report_type'];
                $subtype_id = $this->request->data['document_subtype_id'];
                $district = $this->request->data['osr_district'];
                $taluk = $this->request->data['osr_taluk'];
                $village = $this->request->data['osr_village'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and osr.document_subtype_id = '" . $subtype_id . "'" : '';
                $dist_cond = ($district != '') ? " and osr.district_name = '" . $district . "'" : '';
                $taluk_cond = ($taluk != '') ? " and osr.taluk_name = '" . $taluk . "'" : '';
                $vil_cond = ($village != '') ? " and osr.village_name = '" . $village . "'" : '';
                $connection = ConnectionManager::get('default');

                 if ($report_type == 17) {

                    $osrdoctyp          = $connection->execute("SELECT doc.name as osrdoctypname, count(osr.id) as valcount
																from document_subtypes as doc
																left join osr_records as osr on doc.id = osr.document_subtype_id
																where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
																group by doc.name")->fetchAll('assoc');
                } else if ($report_type == 18) {

                    $osrdistrict        = $connection->execute("SELECT osr.district_name as osrdistname, count(osr.id) as valcount
																from osr_records as osr
																group by osr.district_name")->fetchAll('assoc');
                } else if ($report_type == 19) {

                    $osrtaluk           = $connection->execute("SELECT osr.district_name as osrdistname, osr.taluk_name as osrtalukname, count(osr.id) as valcount
									 							from osr_records as osr
																where 1 $dist_cond 
																group by osr.taluk_name")->fetchAll('assoc');
                } else if ($report_type == 20) {

                    $osrvillage         = $connection->execute("SELECT osr.district_name as osrdistname, osr.taluk_name as osrtalukname, osr.village_name as osrvillagename, count(osr.id) as valcount
									 							from osr_records as osr
																where 1 $dist_cond $taluk_cond
																group by osr.village_name")->fetchAll('assoc');
                }
                if($district != ''){
                $osrtaluks = $this->OsrRecords->find('list', ['keyField' => 'taluk_name', 'valueField' => 'taluk_name'])->where(['OsrRecords.district_name' => $district])->group(['OsrRecords.taluk_name'])->toArray();
                }
                $this->set(compact('osrdoctyp','osrdistrict','osrtaluk','osrvillage','osrtaluks', 'osrvillages', 'record_type','report_type','subtype_id'));

            } elseif ($record_type == 3) { //IFR Wise

                $reportHead = "IFR Records";

                $report_type = $this->request->data['report_type'];
                $district = $this->request->data['ifr_district'];
                $taluk = $this->request->data['ifr_taluk'];
                $village = $this->request->data['ifr_village'];

                $dist_cond = ($district != '') ? " and ifr.district_name = '" . $district . "'" : '';
                $taluk_cond = ($taluk != '') ? " and ifr.taluk_name = '" . $taluk . "'" : '';
                $vil_cond = ($village != '') ? " and ifr.village_name = '" . $village . "'" : '';
                $connection = ConnectionManager::get('default');
                //print_r($dist_cond);  exit();
                 if ($report_type == 21) {

                    $ifrdistrict = $connection->execute("SELECT ifr.district_name as ifrdistname, count(ifr.id) as valcount
																from ifr_records as ifr
																group by ifr.district_name")->fetchAll('assoc');
                } else if ($report_type == 22) {

                    $ifrtaluk = $connection->execute("SELECT ifr.district_name as ifrdistname, ifr.taluk_name as ifrtalukname, count(ifr.id) as valcount
									 							from ifr_records as ifr
																where 1 $dist_cond
																group by ifr.taluk_name")->fetchAll('assoc');
                } else if ($report_type == 23) {

                    $ifrvillage = $connection->execute("SELECT ifr.district_name as ifrdistname, ifr.taluk_name as ifrtalukname, ifr.village_name as ifrvillagename, count(ifr.id) as valcount
									 							from ifr_records as ifr
																where 1 $dist_cond $taluk_cond
																group by ifr.village_name")->fetchAll('assoc');
                }
                if($district != ''){
                $ifrtaluks = $this->IfrRecords->find('list', ['keyField' => 'taluk_name', 'valueField' => 'taluk_name'])->where(['IfrRecords.district_name' => $district])->group(['IfrRecords.taluk_name'])->toArray();
                }
                $this->set(compact('ifrdistrict','ifrtaluk','ifrvillage','ifrtaluks', 'ifrvillages', 'record_type','report_type'));

            } elseif ($record_type == 4) { //GO Wise

                $reportHead = "GO Records";

                $report_type = $this->request->data['report_type'];
                $subtype_id = $this->request->data['document_subtype_id'];
                $dept = $this->request->data['go_department_id'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and go.document_subtype_id = '" . $subtype_id . "'" : '';
                $dept_cond = ($dept != '') ? " and go.go_department_id = '" . $dept . "'" : '';

                $connection = ConnectionManager::get('default');

                if ($report_type == 2) {

                    $godoctyp = $connection->execute("SELECT doc.name as godoctypname, count(go.id) as valcount
														from document_subtypes as doc
														left join go_records as go on doc.id = go.document_subtype_id
														where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
														group by doc.name")->fetchAll('assoc');

                } else if ($report_type == 1) {

                    $godept = $connection->execute("SELECT gdept.name as gdeptname, count(go.id) as valcount
														from go_departments as gdept
														left join go_records as go  on gdept.id = go.go_department_id
														where 1 $dept_cond
														group by gdept.name")->fetchAll('assoc');
                }

                $this->set(compact('godoctyp', 'godept', 'documentSubtypes', 'report_type', 'subtype_id', 'record_type'));

            } elseif ($record_type == 5) { //BP Wise

                $reportHead = "BP Records";

                $subtype_id = $this->request->data['document_subtype_id'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and bp.document_subtype_id = '" . $subtype_id . "'" : '';

                $connection = ConnectionManager::get('default');
                $bpRecords = $connection->execute("SELECT doc.name as bpdoctypname, count(bp.id) as valcount
																from document_subtypes as doc
																left join bp_records as bp on doc.id = bp.document_subtype_id
																where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
																group by doc.name")->fetchAll('assoc');

                $this->set(compact('bpRecords', 'record_type', 'subtype_id'));

            } elseif ($record_type == 6) { //BEIC Wise

                $reportHead = "BEIC Records";

                $report_type = $this->request->data['report_type'];
                $subtype_id = $this->request->data['document_subtype_id'];
                $dept = $this->request->data['beicdepartment'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and beic.document_subtype_id = '" . $subtype_id . "'" : '';
                $dept_cond = ($dept != '') ? " and beic.department = '" . $dept . "'" : '';

                $connection = ConnectionManager::get('default');

                if ($report_type == 4) {

                    $beicdept = $connection->execute("SELECT beic.department as beicdeptname, count(beic.id) as valcount
															from beic_records as beic
															where 1 $dept_cond
															group by beic.department")->fetchAll('assoc');

                } else if ($report_type == 5) {

                    $beicdoctyp = $connection->execute("SELECT doc.name as beicdoctypname, count(beic.id) as valcount
															from document_subtypes as doc
															left join beic_records as beic on doc.id = beic.document_subtype_id
															where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
															group by doc.name")->fetchAll('assoc');
                }

                $this->set(compact('beicdept', 'beicdoctyp', 'documentSubtypes', 'record_type', 'subtype_id', 'report_type'));

            } elseif ($record_type == 7) { //Gazettes Wise

                $reportHead = "Gazettes";

                $subtype_id = $this->request->data['document_subtype_id'];
                $doc_subtyp_cond = ($subtype_id != '') ? " and gz.document_subtype_id = '" . $subtype_id . "'" : '';

                $connection = ConnectionManager::get('default');
                $gazettes = $connection->execute("SELECT doc.name as gzdoctypname, count(gz.id) as valcount
																from document_subtypes as doc
																left join gazettes as gz on doc.id = gz.document_subtype_id
																where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
																group by doc.name")->fetchAll('assoc');

                $this->set(compact('gazettes', 'record_type', 'subtype_id'));

            } elseif ($record_type == 8) { //Voter Records Wise

                $reportHead = "Voter Records";

                $report_type = $this->request->data['report_type'];
                $constituency = $this->request->data['constituency'];
                $district = $this->request->data['vr_district'];
                $taluk = $this->request->data['vr_taluk'];
                $village = $this->request->data['vr_village'];
                $subtype_id = $this->request->data['document_subtype_id'];
                $year = $this->request->data['year'];

                $con_cond = ($constituency != '') ? " and vr.constituency_name = '" . $constituency . "'" : '';
                $dist_cond = ($district != '') ? " and vr.district_name = '" . $district . "'" : '';
                $taluk_cond = ($taluk != '') ? " and vr.taluk_name = '" . $taluk . "'" : '';
                $vil_cond = ($village != '') ? " and vr.village_name = '" . $village . "'" : '';
                $doc_subtyp_cond = ($subtype_id != '') ? " and vr.document_subtype_id = '" . $subtype_id . "'" : '';
                $year_cond = ($year != '') ? " and vr.record_year = '" . $year . "'" : '';
                $connection = ConnectionManager::get('default');
                // $voterRecords      = $connection->execute("SELECT vr.*,dst.name as doc_subtype_name
                //                                             FROM voter_records as vr
                //                                             LEFT JOIN document_subtypes as dst on dst.id = vr.document_subtype_id
                //                                             WHERE 1 $con_cond  $dist_cond $taluk_cond $vil_cond $doc_subtyp_cond $year_cond AND vr.is_active=1")->fetchAll('assoc');
               // print_r($dist_cond);   exit();
                if ($report_type == 7) {

                    $vrdoctyp = $connection->execute("SELECT doc.name as vrdoctypname, count(vr.id) as valcount
																from document_subtypes as doc
																left join voter_records as vr on doc.id = vr.document_subtype_id
																where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
																group by doc.name")->fetchAll('assoc');
                } else if ($report_type == 8) {

                    $vrconst = $connection->execute("SELECT vr.constituency_name as vrconstname, count(vr.id) as valcount
																from voter_records as vr
																group by vr.constituency_name")->fetchAll('assoc');
                } else if ($report_type == 9) {

                    $vrdistrict = $connection->execute("SELECT vr.district_name as vrdistname, count(vr.id) as valcount
																from voter_records as vr
																group by vr.district_name")->fetchAll('assoc');
                } else if ($report_type == 10) {

                    $vrtaluk = $connection->execute("SELECT vr.district_name as vrdistname, vr.taluk_name as vrtalukname, count(vr.id) as valcount
									 							from voter_records as vr
																where 1 $dist_cond
																group by vr.taluk_name")->fetchAll('assoc');
                } else if ($report_type == 11) {

                    $vrvillage = $connection->execute("SELECT vr.district_name as vrdistname, vr.taluk_name as vrtalukname, vr.village_name as vrvillagename, count(vr.id) as valcount
																from voter_records as vr
																where 1 $dist_cond $taluk_cond
																group by vr.village_name")->fetchAll('assoc');
                }
                if($district != ''){
                $vrtaluks = $this->VoterRecords->find('list', ['keyField' => 'taluk_name', 'valueField' => 'taluk_name'])->where(['VoterRecords.district_name' => $district])->group(['VoterRecords.taluk_name'])->toArray();
                }
                $this->set(compact('vrdoctyp', 'vrconst','vrdistrict','vrtaluk','vrvillage','documentSubtypes', 'vrtaluks', 'vrvillages', 'year', 'record_type', 'subtype_id', 'report_type'));

            } elseif ($record_type == 9) { //BR Wise

                $reportHead = "Book Records";
                
                $report_type = $this->request->data['report_type'];
                $subtype_id = $this->request->data['document_subtype_id'];
                $brauthor = $this->request->data['brauthor'];
                $brpublisher = $this->request->data['brpublisher'];

                $doc_subtyp_cond = ($subtype_id != '') ? " and br.document_subtype_id = '" . $subtype_id . "'" : '';
                $connection = ConnectionManager::get('default');
                $bookRecords = $connection->execute("SELECT doc.name as brdoctypname, count(br.id) as valcount
																from document_subtypes as doc
																left join book_records as br on doc.id = br.document_subtype_id
																where doc.document_type_id = '" . $record_type . "' $doc_subtyp_cond
																group by doc.name")->fetchAll('assoc');

                $authors = $this->BookRecords->find('list', ['keyField' => 'author', 'valueField' => 'author'])->where(['BookRecords.document_subtype_id' => $subtype_id])->group(['BookRecords.author'])->toArray();
                $publishers = $this->BookRecords->find('list', ['keyField' => 'publisher_name', 'valueField' => 'publisher_name'])->where(['BookRecords.author' => $brauthor])->group(['BookRecords.publisher_name'])->toArray();

                $this->set(compact('bookRecords', 'record_type', 'subtype_id', 'brauthor', 'brpublisher', 'authors', 'publishers'));
            }
            $this->set(compact('record_type' ,'record_name','report_name'));
        }
        $this->set(compact('recordTypes', 'reportTypes', 'osrdistricts', 'fmbdistricts', 'ifrdistricts', 'vrdistricts', 'goDepartments', 'beicdepartments', 'vrconstituencys', 'vryears', 'authors', 'publishers'));
    }
	
    public function customize_rti_report()
    {
	  $this->viewBuilder()->layout('layout');  
      $this->loadModel("DocumentTypes");	  
      $this->loadModel("RtiApplicationTypes");	  
      $this->loadModel("RtiRequestTypes");	 
			
		 if ($this->request->is('post')) { 
			 $doc_type_id        = $this->request->data['document_type_id'];
			 $rti_req_id         = $this->request->data['rti_request_type'];
			 $from_date          = date('Y-m-d',strtotime($this->request->data['from_date']));
			 $to_date            = date('Y-m-d',strtotime($this->request->data['to_date']));

			 if(($this->request->data['from_date']) &&($this->request->data['to_date'])){
				$date_condition   = "and date(rti.created_on) >='".$from_date."' and date(rti.created_on) <='".$to_date."'";
			 }elseif(($this->request->data['from_date']) && !($this->request->data['to_date'])){
				$date_condition   = "and date(rti.created_on) >='".$from_date."'";
			 }elseif(!($this->request->data['from_date']) && ($this->request->data['to_date'])){
				$date_condition   = "and date(rti.created_on) <='".$to_date."'";  
			 }elseif(($this->request->data['from_date'] =='') && ($this->request->data['to_date'] =='')){
				$date_condition   = "";
			 }	
			 
			 $doc_name         = $this->DocumentTypes->find('all')->where(['DocumentTypes.id'=>$doc_type_id])->first()['name'];
			 if($this->Auth->user('role_id') == 3){
				$app_type_con  = " and rti.application_request_type != 'Online' and rti.created_by = '".$this->Auth->user('id')."'";
			 }else{
				$app_type_con  = "";
			 }				 
                  
			 if($this->Auth->user('role_id') == 5){
                  $section_id        = $this->Auth->user('department_section_id');
				  $doc_types         = $this->DocumentTypes->find('all')->where(['DocumentTypes.department_section_id'=>$section_id])->toArray();
				  foreach($doc_types as $doctype){
					$present_doc.= $doctype['id'].',';			  
				  }
				  $present_doc_type = rtrim($present_doc,','); 				 
				  $doc_type  	  = ($doc_type_id != '')?" and rti.document_type_id = '".$doc_type_id."'":"and rti.document_type_id = ('".$present_doc_type."')";		  
			 }else{  
			      $doc_type  	  = ($doc_type_id != '')?" and rti.document_type_id = '".$doc_type_id."'":'';		  
			 }
			 //$req_type 	      = ($rti_req_id != '')?" and rti.rti_request_type_id = '".$rti_req_id."'":'';			 
			 
			 $connection        = ConnectionManager::get('default');
			 $rtiRequestRecords = $connection->execute("select rt.name as request_type,dt.name as doc_type_name,
			                                         SUM(CASE WHEN rti.rti_request_type_id = 1  THEN 1 ELSE 0 END)AS rti_count,SUM(CASE WHEN rti.rti_request_type_id = 2 THEN 1 ELSE 0 END)AS normal_count
													 FROM rti_request_records as rti
													 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
													 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
													 WHERE 1 $doc_type $date_condition $app_type_con")->fetchAll('assoc');
		}
	  
	if($this->Auth->user('role_id') == 5){  
	  $section_id      = $this->Auth->user('department_section_id');
	  $documentTypes   = $this->DocumentTypes->find('list',['keyField'=>'id','valueField'=>'name'])->where(['DocumentTypes.department_section_id'=>$section_id,'DocumentTypes.is_active'=>1])->toArray();
	}else{
	  $documentTypes   = $this->DocumentTypes->find('list',['keyField'=>'id','valueField'=>'name'])->where(['DocumentTypes.is_active'=>1])->toArray();
	}
	   
    $this->set(compact('rtiRequestRecords','documentTypes','app_types','req_types','from_date','to_date','doc_type_id','rti_req_id','doc_name'));
   }
   
   
    public function doc_fee_report()
    {
	  $this->viewBuilder()->layout('layout'); 
    
			
		 if ($this->request->is('post')) { 			
			 $report_type        = $this->request->data['report_type'];			
			 if($report_type == 1){
			 
			 $from_date = date('Y-m-d',strtotime($this->request->data['from_date']));
			 $date_from = strtotime($from_date);   
			 $to_date   =  date('Y-m-d',strtotime($this->request->data['to_date']));  
			 $date_to   = strtotime($to_date); // Convert date to a UNIX timestamp  
			 $j=1; 
			 
			$fee_details  = array();
			for ($i=$date_from; $i<=$date_to; $i+=86400) {
			 $connection     = ConnectionManager::get('default');
			 $report         = $connection->execute("select sum(rti.document_fee) as doc_fee,sum(rti.processing_fee) as processing_fee
													 FROM rti_request_records as rti												
													 WHERE date(rti.created_on) = '".date("Y-m-d", $i)."'
													 GROUP BY date(rti.created_on)
													 ORDER BY date(rti.created_on)
													 ")->fetchAll('assoc');
														 
														 
														 
			  $fee_details[date("d-m-Y", $i)]['date']           =  date("d-m-Y", $i);
			  $fee_details[date("d-m-Y", $i)]['doc_fee']        =  ($report[0]['doc_fee'])?$report[0]['doc_fee']:0;										 
			  $fee_details[date("d-m-Y", $i)]['processing_fee'] =  ($report[0]['processing_fee'])?$report[0]['processing_fee']:0;										 
													 
			}										 
			}else if($report_type == 2){
			 
			 $from_date = date('Y-m',strtotime($this->request->data['from_month']));
			 $to_date   =  date('Y-m',strtotime($this->request->data['to_month']));  
			 $j=1; 			
			 
			$fee_details  = array();
			for ($month=$from_date; $month<=$to_date; $month=date('Y-m',strtotime("+1 months", strtotime($month)))) {				
		     $connection     = ConnectionManager::get('default');
			 $report         = $connection->execute("select sum(rti.document_fee) as doc_fee,sum(rti.processing_fee) as processing_fee
													 FROM rti_request_records as rti												
													 where date_format(rti.created_on,'%Y-%m')='".$month."'
													 GROUP BY  date_format(rti.created_on,'%Y-%m')													 
													 ")->fetchAll('assoc');
														 
														 
														 
			  $fee_details[$month]['month']          =   date('M-Y',strtotime($month));
			  $fee_details[$month]['doc_fee']        =  ($report[0]['doc_fee'])?$report[0]['doc_fee']:0;										 
			  $fee_details[$month]['processing_fee'] =  ($report[0]['processing_fee'])?$report[0]['processing_fee']:0;								 
			}									 
		  }
		}
	  
  
    $this->set(compact('fee_details','from_date','to_date','doc_type_id','rti_req_id','doc_name','report_type'));  
   } 
   
   
    public function user_count_report(){
		$this->viewBuilder()->layout('layout');
		$this->loadModel('Districts');	
		
		if ($this->request->is('post')) { 
			$districtid    = $this->request->data['district_id'];	
			if($districtid != ''){
				$districts    = $this->Districts->find('all')->where(['Districts.is_active'=>1,'Districts.id'=>$districtid])->order(['Districts.name'=>'ASC'])->toArray();
			}else{
				$districts    = $this->Districts->find('all')->where(['Districts.is_active'=>1])->order(['Districts.name'=>'ASC'])->toArray();
			}
		   
				
			$user_details = array();			
			foreach($districts as $key=>$district){
				$condition   = " and d.id='".$district['id']."'";	
				$connection	 = ConnectionManager::get('default');							   
						   
				$report      = $connection->execute("SELECT d.name as district,d.id as district_id,count(u.id) as user_count													
													FROM users as u
													LEFT JOIN districts as d on d.id = u.district_id															
													WHERE u.is_active = 1 and u.role_id =7 ".$condition."									
													GROUP by d.name")->fetchAll('assoc');
					
				$user_details[$key]['district']        	          =  $district['name'];
				$user_details[$key]['district_id']                =  $report[0]['district_id'];
				$user_details[$key]['count']   		              =  $report[0]['user_count'];	
			}
		}
		$districts_list     = $this->Districts->find('list',['keyField'=>'id','valueField'=>'name'])->where(['Districts.is_active'=>1])->order(['Districts.name'=>'ASC']);
				
		$this->set(compact('districts_list','user_details'));  
	}
	
	
	public function ajaxgetuserdetails($district_id = null)
    {
		$this->viewBuilder()->layout('');
		$this->loadModel('Users');		

		if($district_id != ''){
			$users    = $this->Users->find('all', ['contain' => ['Roles','Districts','Taluks']])->where(['Users.is_active'=>1,'Users.role_id'=>7,'Users.district_id'=>$district_id])->toArray();
		}	
		
		$this->set(compact('users'));
    }
	
	
	public function ajaxgetrtidetails($doc_type_id = null,$rti_req_id= null,$from_date = null,$to_date = null)
	{
      	$this->viewBuilder()->layout('');
        $this->LoadModel('RtiRequestRecords');  
        $this->LoadModel('RtiStatusLogs');  
        $this->LoadModel('Statuses');

		 $doc_type  	  = ($doc_type_id != '')?" and rti.document_type_id = '".$doc_type_id."'":'';
		 $req_type 	      = ($rti_req_id != '0')?" and rti.rti_request_type_id = '".$rti_req_id."'":'';	 
		
		if(($from_date  !='') && ($to_date  !='')){
			$date_condition  = "and date(rti.created_on) >='".$from_date."' and date(rti.created_on) <='".$to_date."'";
		 }elseif(($from_date !='') && ($to_date =='')){
			$date_condition  = "and date(rti.created_on) >='".$from_date."'";
		 }elseif(($from_date =='') && ($to_date !='')){
			$date_condition  = "and date(rti.created_on) <='".$to_date."'";  
		 }elseif(($from_date =='') && ($to_date =='')){
			$date_condition  = "";
		 }	
		 if($this->Auth->user('role_id') == 3){
			$app_type_con  = " and rti.application_request_type != 'Online' and rti.created_by = '".$this->Auth->user('id')."'";
		 }else{
			$app_type_con  = "";
		 }	
		 $connection         = ConnectionManager::get('default');
		 $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
												 FROM rti_request_records as rti
												 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
												 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
												 WHERE 1 $doc_type $req_type $date_condition $app_type_con")->fetchAll('assoc');
		
		$this->set(compact('rtiRequestRecords','from_date','to_date'));       
	 }
		 
	public function ajaxdocsubtype($id = null){

      	$this->viewBuilder()->layout('');
        $this->LoadModel('DocumentSubtypes');

			$documentSubtypes    = $this->DocumentSubtypes->find('list', array('order'=>'DocumentSubtypes.name ASC'))->where(['DocumentSubtypes.document_type_id' => $id])->toArray();
		
      
       $this->set(compact('documentSubtypes'));
      

	}
	
	public function ajaxgetreporttype($id = null)
    {

        $this->viewBuilder()->layout('');
        $this->LoadModel('ReportTypes');

        $reportTypes = $this->ReportTypes->find('list', array('order' => 'ReportTypes.order_flag ASC'))->where(['ReportTypes.document_type_id' => $id])->toArray();

        $this->set(compact('reportTypes'));

    }
    
    public function ajaxgetdeadlinedetails($type = null)
	{
		$this->viewBuilder()->layout('');
       
		 $connection         = ConnectionManager::get('default');
	    if($type == 1){
		   $today = date('Y-m-d');	
		  $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
												 FROM rti_request_records as rti
												 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
												 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
												 where rti.rti_request_type_id = 1 and rti.deadline_date = '" . $today . "'
                                                 ")->fetchAll('assoc');
												 
		}else if ($type == 2){
		   $tomorrow = date('Y-m-d', strtotime("+1 days"));	
		  $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
											 FROM rti_request_records as rti
											 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
											 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
											 where rti.rti_request_type_id = 1 and rti.deadline_date = '".$tomorrow."'
                                             ")->fetchAll('assoc');
		
		}else if ($type == 3){
		  $today  = date('Y-m-d');
		 $next30 = date('Y-m-d', strtotime("+30 days"));	
		 $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
											 FROM rti_request_records as rti
											 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
											 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
											 where rti.rti_request_type_id = 1  and rti.deadline_date >= '" . $today . "'  and rti.deadline_date <= '".$next30."'
						                     ")->fetchAll('assoc');
		
		 }			
		
		 $this->set(compact('rtiRequestRecords','type'));
		
	}
	
	
	
	public function ajaxgetofficerlevel($level = null)
	{
		$this->viewBuilder()->layout('');
       
		 $connection         = ConnectionManager::get('default');
	    if($level != ''){		 
		  $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name,rol.name as officer_role
												 FROM rti_request_records as rti
												 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
												 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
												 LEFT JOIN roles as rol on rol.id = rti.officer_level
												 where rti.officer_level = '" . $level . "'
                                                 ")->fetchAll('assoc');												 
		}		
		
		 $this->set(compact('rtiRequestRecords')); 		
	}
	
	public function ajaxgetdoctype($doc_type = null)
	{
		$this->viewBuilder()->layout('');
       
		$connection         = ConnectionManager::get('default');
	    if($doc_type != ''){		 
		  $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
												 FROM rti_request_records as rti
												 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
												 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
												 LEFT JOIN roles as rol on rol.id = rti.officer_level
												 where rti.document_type_id = '" . $doc_type . "'
                                                 ")->fetchAll('assoc');												 
		}		
		
		 $this->set(compact('rtiRequestRecords')); 		
	}
	
	public function ajaxgetappstatus($status = null)
	{
		$this->viewBuilder()->layout('');
       
		 $connection         = ConnectionManager::get('default');
	    if($status != ''){		 
		  $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
												 FROM rti_request_records as rti
												 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
												 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
												 LEFT JOIN roles as rol on rol.id = rti.officer_level
												 where rti.application_status = '" . $status . "'
                                                 ")->fetchAll('assoc');
												 
		}		
		 $this->set(compact('rtiRequestRecords','status')); 		
	}
	
	public function ajaxgetreqtype($req_type = null)
	{
		$this->viewBuilder()->layout('');
       
		 $connection         = ConnectionManager::get('default');
	    if($req_type != ''){		 
		  $rtiRequestRecords  = $connection->execute("select rti.*,rt.name as request_type,dt.name as doc_type_name
												 FROM rti_request_records as rti
												 LEFT JOIN document_types as dt on dt.id = rti.document_type_id
												 LEFT JOIN rti_request_types as rt on rt.id = rti.rti_request_type_id
												 LEFT JOIN roles as rol on rol.id = rti.officer_level
												 where rti.rti_request_type_id = '" . $req_type . "'
                                                 ")->fetchAll('assoc');												 
		}		
		
		 $this->set(compact('rtiRequestRecords'));  		
	}



}
