<?php
$config_params = 
[
	
	[
		"param" =>"name",
		"title" =>"Наименование симуляции",
	],
	[
		"param" =>"parent_id",
		"title" =>"ID владельца",
	],
	[
		"param" =>"remaining_station_fuel",
		"title" =>"Остаток топлива на АЗС",
	],
	[
		"param" =>"remaining_storage_fuel",
		"title" =>"Остаток топлива в хранилище",
	],
	[
		"param" =>"staitions_count",
		"title" =>"Количество существующих АЗС",
	],
	[
		"param" =>"tanker_count",
		"title" =>"Количество существующих танкеров для поставки топлива",
	],
	[
		"param" =>"tanker_price",
		"title" =>"Стоимость одного танкера",
	],
	[
		"param" =>"tanker_delivery_time",
		"title" =>"Время, за которое танкер доставит топливо в АЗС",
	],
	
	
	[
		"param" =>"increase_coef",
		"title" =>"Коэффициент увеличения среднего чека в зависимости от количества обслуживаемых мест",
	],
	[
		"param" =>"average_price",
		"title" =>"Средний чек",
	],
	
	[
		"param" =>"basic_station_maintenance_cost",
		"title" =>"Базовая стоимость содержания АЗС (без учета обслуживаемых мест)",
	],
	[
		"param" =>"additional_station_maintenance_cost",
		"title" =>"Дополнительная стоимость содержания одного обслуживаемого места",
	],
	[
		"param" =>"basic_setup_time",
		"title" =>"Время постройки базовой части АЗС",
	],
	[
		"param" =>"serving_place_setup_time",
		"title" =>"Время постройки одного обслуживаемого места",
	],
	[
		"param" =>"cashier_coast",
		"title" =>"Стоимость содержания кассира",
	],
	[
		"param" =>"attendant_coast",
		"title" =>"Стоимость содержания заправщика",
	],
	[
		"param" =>"director_coast",
		"title" =>"Стоимость содержания директора",
	],
	[
		"param" =>"security_coast",
		"title" =>"Стоимость содержания охранника",
	],
	[
		"param" =>"seats_served_count_for_add",
		"title" =>"Количество обслуживаемых мест, при котором нужно нанять дополнительного кассира",
	],
	[
		"param" =>"probability_dismissal",
		"title" =>"Вероятность увольнения сотрудника по ГПХ (в %)",
	],
	[
		"param" =>"fuel_per_client_coef",
		"title" =>"Количество топлива на клиента",
	],
	[
		"param" =>"fuel_per_serving_place_coef",
		"title" =>"Количество топлива на место заправки",
	],
	
];
?>