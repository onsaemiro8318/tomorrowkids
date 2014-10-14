<?
    /******************************************************************************
     *
     * global.php
     *
     * Configuration file
     *
     * Created : 2014
     *
     ******************************************************************************/


	include $_SERVER["DOCUMENT_ROOT"] . "/include/dir.php";

	// tomorrowkids-DB
	$_db_info_tk[host_ip]  = "218.54.31.121";
	$_db_info_tk[user]     = "root";
	$_db_info_tk[password] = "m!nv#Rtisin9";
	$_db_info_tk[database] = "tomorrowkids";

	/*------------------------------------------------------------
		[USAGE]

		// DB 접속시
		$dbi_gns_test = new CDbi();
		$dbi_gns_test->connectDB_gns();
		$dbi_gns_test->close();

		(or)

		$_db_info[host_ip]  = "000.000.000.000";
		$_db_info[user]     = "게정명";
		$_db_info[password] = "비밀번호";
		$_db_info[database] = "디비명";
		$dbi_info = new CDbi();
		$dbi_info->connectDBWithArr($_db_info);
		$dbi_info->close();
	 *------------------------------------------------------------*/


	class CDbi
	{
		//protected $conn = null;
		public $conn = null;
		protected $host_ip = null;
		protected $user = null;
		protected $password = null;
		protected $database = null;
		protected $f_return_type_boolean = true;

		// [CAUTION] session handling DB 인 경우에는 __destruct 에서 connection을 close 하면 안된다.
		//           session write 를 위한 DB update 를 하기 전에 클래스 인스턴스들의 __destruct 가 먼저 불려지기 때문에
		//           __destruct 에서 connection을 닫으면 session update를 실패하게 된다.
		//           default : false
		protected $f_not_close_in_destruct = false;

		protected $_last_query_str = "";

		// for debuging
		protected $_debug_f_update_allowed = true;
		protected $_debug_f_do_not_update_but_return_true = false; // update 실행은 하지 않으나 true를 리턴하도록 하는 flag

		public function __construct()
		{
		}

		public function __destruct()
		{
			if(!empty($this->conn))
			{
				if($this->f_not_close_in_destruct === false)
				{
					return mysqli_close($this->conn);
				}
			}
		}

		public function setDbInfo($host_ip, $user, $password)
		{
			$this->host_ip = $host_ip;
			$this->user = $user;
			$this->password = $password;
		}

		public function setDBInfoArr($db_info_arr)
		{
			$this->host_ip = $db_info_arr[host_ip];
			$this->user = $db_info_arr[user];
			$this->password = $db_info_arr[password];

			if(!empty($db_info_arr[database]))
			{
				$this->database = $db_info_arr[database];
			}
		}

		public function setDatabase($database)
		{
			$this->database = $database;
		}

		public function set_f_return_type_boolean($f_return_type_boolean)
		{
			$this->f_return_type_boolean = $f_return_type_boolean;
		}

		public function set_f_not_close_in_destruct($f_not_close_in_destruct)
		{
			$this->f_not_close_in_destruct = $f_not_close_in_destruct;
		}

		public function dumpDBInfo()
		{
			print("==============================================\n");
			print("Host IP : $this->host_ip\n");
			print("User : $this->user\n");
			print("Password : $this->password\n");
			print("Database : $this->database\n");
			print("(f_return_type_boolean) : $this->f_return_type_boolean\n");
			print("(f_not_close_in_destruct) : $this->f_not_close_in_destruct\n");
			print("(_last_query_str) : $this->_last_query_str\n");
			print("(_debug_f_update_allowed) : $this->_debug_f_update_allowed\n");
			print("(_debug_f_do_not_update_but_return_true) : $this->_debug_f_do_not_update_but_return_true\n");
			print("==============================================\n");
			print("\n");
		}

		public function connect()
		{
			$this->conn = @mysqli_connect($this->host_ip, $this->user, $this->password, true)
				or $this->fatalError(__FILE__, __LINE__,
					"DB 접속시 에러가 발생했습니다" . mysqli_error(),
					"DB 접속시 에러가 발생했습니다. 잠시 후 다시 시도해 주세요.");
		}

		public function selectDB()
		{
			@mysqli_select_db($this->database, $this->conn)
				or $this->fatalError(__FILE__, __LINE__,
					"DB Select 에러가 발생했습니다" . mysqli_error(),
					"DB 에러가 발생했습니다. 잠시 후 다시 시도해 주세요.");

			// [NOTE] 아래 코드를 실행하지 않으면 INSERT 시 한글이 깨짐.
			$this->execQuery("SET NAMES euckr");
		}

		public function connectAndSelectDB($database = null)
		{
			if(!empty($database))
			{
				$this->setDatabase($database);
			}

			$this->connect();

			$this->selectDB();
		}

		public function connectDBWithArr($db_info_arr)
		{
			$this->setDBInfoArr($db_info_arr);

			$this->connect();

			$this->selectDB();
		}

		public function connectDB_gns()
		{
			global $_db_info_gns;

			$this->connectDBWithArr($_db_info_gns);
		}

		public function connectDB_bsk()
		{
			global $_db_info_bsk;

			$this->connectDBWithArr($_db_info_bsk);
		}
		public function connectDB_shop()
		{
			global $_db_info_shop;

			$this->connectDBWithArr($_db_info_shop);
		}

		public function connectDB_ems()
		{
			global $_db_info_ems;

			$this->connectDBWithArr($_db_info_ems);
		}

		public function connectDB_mobile()
		{
			global $_db_info_mobile;

			$this->connectDBWithArr($_db_info_mobile);
		}

		public function getConnection()
		{
			return $this->conn;
		}

		public function close()
		{
			if(!empty($this->conn))
			{
				$res = @mysqli_close($this->conn);
				unset($this->conn);
				return $res;
			}
		}

	}
?>
