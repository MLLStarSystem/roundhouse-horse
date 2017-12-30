<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Report_model extends CI_Model{

            public function __construct()
            {
                parent::__construct();
            }


            function compare_today_and_last_month_sales()
	    {
                $sql = "SELECT COALESCE(SUM(sales.total),0) last_month, (SELECT COALESCE(SUM(sales.total),0) as sales FROM `tbl_sales_group` sales
                        WHERE sales.date_created = curdate()) as sales
                        FROM `tbl_sales_group` sales
                        WHERE sales.date_created = DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
	        	
	        $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result();
	        }
            }
            
            
            function get_weekly_sales(){
                $sql = "SELECT qb.dy as yourday, COALESCE(SUM(total), 0) as total 
                        from tbl_sales_group qa 
                        right outer join (
                            select curdate() as dy    union
                            select DATE_SUB(curdate(), INTERVAL 1 day) as dy     union
                            select DATE_SUB(curdate(), INTERVAL 2 day) as dy     union
                            select DATE_SUB(curdate(), INTERVAL 3 day) as dy     union
                            select DATE_SUB(curdate(), INTERVAL 4 day) as dy     union
                            select DATE_SUB(curdate(), INTERVAL 5 day) as dy     union
                            select DATE_SUB(curdate(), INTERVAL 6 day) as dy        
                            ) as qb 
                        on qa.date_created = qb.dy 
                        and qa.date_created > DATE_SUB(curdate(), INTERVAL 7 day)
                        GROUP by qb.dy
                        order by qb.dy asc";
                
                $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }
            }
            function compare_week_and_last_week_sales(){
                 $sql = "SELECT COALESCE(SUM(total), 0) as sales,
                    (
                        SELECT COALESCE(SUM(total), 0) as sales
                    from tbl_sales_group qa 
                    right outer join (
                       select  DATE_SUB(curdate(), INTERVAL 7 day) as dy    union
                        select DATE_SUB(curdate(), INTERVAL 8 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 9 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 10 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 11 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 12 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 12 day) as dy      
                        ) as qb 
                    on qa.date_created = qb.dy 
                    and qa.date_created > DATE_SUB(curdate(), INTERVAL 7 day)
                    order by qb.dy asc
                    ) as last_week

                    from tbl_sales_group qa 
                    right outer join (
                        select curdate() as dy    union
                        select DATE_SUB(curdate(), INTERVAL 1 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 2 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 3 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 4 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 5 day) as dy     union
                        select DATE_SUB(curdate(), INTERVAL 6 day) as dy        
                        ) as qb 
                    on qa.date_created = qb.dy 
                    and qa.date_created > DATE_SUB(curdate(), INTERVAL 7 day)
                    order by qb.dy asc";
                 
                $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result();
	        }
            }
            
            function get_yearly_sales(){
                 $sql = "SELECT COALESCE(SUM(sales.total),0) as sales FROM `tbl_sales_group` sales
                        WHERE YEAR(sales.date_created) = YEAR(curdate())";
	        	
	        $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }
            }
            
            function get_yearly_sales_graph(){
                $sql = "SELECT  Months.id AS `month`,COALESCE(main.sales,0) as sales
                FROM 
                (SELECT 1 as ID UNION SELECT 2 as ID UNION  SELECT 3 as ID UNION SELECT 4 as ID UNION SELECT 5 as ID UNION SELECT 6 as ID UNION SELECT 7 as ID UNION SELECT 8 as ID UNION SELECT 9 as ID UNION SELECT 10 as ID UNION SELECT 11 as ID UNION SELECT 12 as ID) AS Months
                LEFT JOIN (
                SELECT  month(`sales`.date_created) as month_id, COALESCE(SUM(sales.total),0) as sales FROM `tbl_sales_group` sales
                WHERE YEAR(`sales`.date_created) = YEAR(curdate()) 
                GROUP BY month(`sales`.date_created)
                ) as main on Months.ID = main.month_id";
                
                 $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }

            }
            
            function get_monthly_sales_graph(){
                $sql = "SELECT  Months.id AS `month`,COALESCE(washer.total,0) as washer,COALESCE(dryer.total,0) as dryer,COALESCE(addon.total,0) as addon
                FROM 
                (SELECT 1 as ID UNION SELECT 2 as ID UNION  SELECT 3 as ID UNION SELECT 4 as ID UNION SELECT 5 as ID UNION SELECT 6 as ID UNION SELECT 7 as ID UNION SELECT 8 as ID UNION SELECT 9 as ID UNION SELECT 10 as ID UNION SELECT 11 as ID UNION SELECT 12 as ID) AS Months
                LEFT JOIN (
                SELECT month(`main`.date_created) as month_id, COALESCE(SUM(price), 0) as total
                FROM `tbl_washer_transaction` as main
                WHERE YEAR(`main`.date_created) = YEAR(curdate()) 
                GROUP BY month(`main`.date_created)
                ) as washer on Months.ID = washer.month_id
                LEFT JOIN (
                SELECT month(`main`.date_created) as month_id, COALESCE(SUM(price), 0) as total
                FROM `tbl_dryer_transaction` as main
                WHERE YEAR(`main`.date_created) = YEAR(curdate()) 
                GROUP BY month(`main`.date_created)
                ) as dryer on Months.ID = dryer.month_id
                LEFT JOIN (
                SELECT month(`main`.date_created) as month_id, COALESCE(SUM(price), 0) as total
                FROM `tbl_addon_sales` as main
                WHERE YEAR(`main`.date_created) = YEAR(curdate()) 
                GROUP BY month(`main`.date_created)
                ) as addon on Months.ID = addon.month_id
                 ORDER BY  Months.id ASC";
                
                $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }

            }
            function get_monthly_washer_sales(){
                
                $sql = "SELECT SUM(main.price) as total, washer_id,description FROM `tbl_washer_transaction` main
                        INNER JOIN tbl_washers washer on washer.ID = main.washer_id WHERE MONTH(main.date_created) = MONTH(CURDATE()) GROUP BY main.washer_id";
                $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }
            }
            
            function get_monthly_dryer_sales(){
                
                $sql = "SELECT SUM(main.price) as total, dryer_id,description FROM `tbl_dryer_transaction` main
                        INNER JOIN tbl_dryers dryer on dryer.ID = main.dryer_id 
                        WHERE MONTH(main.date_created) = MONTH(CURDATE()) GROUP BY main.dryer_id";
                $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }
            }
            
            function get_monthly_addon_sales(){
                
                $sql = "SELECT SUM(main.price) as total, addons_id,description FROM `tbl_addon_sales` main
                        INNER JOIN tbl_addons addons on addons.ID = main.addons_id 
                        WHERE MONTH(main.date_created) = MONTH(CURDATE()) GROUP BY main.addons_id";
                $query = $this->db->query($sql);

	        if($query->num_rows() > 0)
	        {
                    return $query->result_array();
	        }
            }
            
    }
?>
