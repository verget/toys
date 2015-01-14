<div class="inner_udiv" style="padding-bottom: 20px;">
<h1>Анкета соискателя</h1>
<div id="anketa-frame" style="width: 730px; min-height: 450px; border: 0px solid #eee;">
	
	<div style="margin-bottom: 30px;">		
		<p>Вы можете заполнить анкету на этой страничке или направить готовое резюме по эл. почте на адрес <a href="mailto:some@mail.com">some@mail.com</a><br>
		<span style="color: red; font-weight: bold; font-size: 16px;">*</span> - поля, обязательные к заполнению</p>
	</div>
	
<table class="anketa">	
	
		<tbody><tr>
		<td colspan="3"> <h2>Вакансия</h2> <br> </td></tr>
		<tr>
			<td style="width: 300px;">Заявка на должность</td>
			<td> 
			<select id="anketa_vac_1" onchange="check_optional_vacancy();">
					<option>Агент по аренде квартир и комнат</option>
					<option>Агент по строящейся недвижимости</option>
					<option>Агент по вторичному рынку</option>
					<option>Агент по загородному рынку</option>
					<option>Агент по коммерческой недвижимости</option>
					<option>Руководитель риэлторской группы</option>
					<option>Другое</option>
					</select> 
				</td>
			<td></td>
			</tr>
			
			
		<tr id="vac_1_er" style="display: none;">
			<td>Название должности</td>
			<td> <input id="anketa_vac_1_er" style="margin-right: 6px; width: 294px;" type="text"> </td>
			<td></td>
			</tr>
			
			
		<tr>
			<td style="width: 300px;">Опыт работы в сфере недвижимости</td>
			<td> 
			<select id="anketa_vac_3">
					<option>Нет опыта</option>
					<option>Личный опыт (самостоятельная покупка, продажа собственной недвижимости)</option>
					<option>Агентский опыт</option>
					<option>Опыт руководства риэлторской группой</option>
					</select> 
				</td>
			<td></td>
			</tr>
			
			
		<tr>
			<td style="width: 300px;">Удобный для вас офис</td>
			<td> 
				<select id="anketa_vac_2" type="text">
					<option>Не важно</option>
					<option>м. Простоквашино, ул. Шарикова, д.5</option>
					<option>м. Дядифедоровская, пр. Науки, д.66</option>
					<option>м. Василеиванческая, пр Петькина , д. 4/375</option>				
				</select> 
				</td>
			<td></td>
			</tr>
	
		<tr><td colspan="3">  <br><br> <h2>Личные данные</h2> <br> </td></tr>
		<tr>
			<td style="width: 300px;">Фамилия<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td> <input id="anketa_fio_1" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>Имя<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td> <input id="anketa_fio_2" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>Отчество<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td> <input id="anketa_fio_3" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>Дата рождения<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td> <input id="anketa_date" type="text"> </td>
			<td></td>
			</tr>
			
			
			
		<tr><td colspan="3"> <br><br> <h2>Контактные данные</h2> <br> </td></tr>
		<tr>
			<td>Адрес прописки<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td>
			
				<select id="anketa_address">
					<option>Санкт-Петербург</option>
					<option>Ленинградская область</option>
					<option>Другой регион</option>
					</select> 
				</td>
			<td></td>
			</tr>
		<tr>
			<td>Телефон<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td> <input id="anketa_tel1" type="text"> </td>
			<td></td>
			</tr>
		<tr style="display: none;">
			<td>Телефон #2</td>
			<td> <input id="anketa_tel2" type="text"> </td>
			<td></td>
			</tr> 
		<tr>
			<td>E-mail<span style="color: red; font-weight: bold; font-size: 16px;">*</span></td>
			<td> <input id="anketa_email" type="text"> </td>
			<td></td>
			</tr>
		
		
		
		<tr><td colspan="3"> <br><br> <h2>Образование</h2> <br> </td></tr>
		<tr>
			<td>Уровень</td>
			<td>
				<select id="anketa_obr_1">
					<option>Неоконченное среднее</option>
					<option>Среднее</option>
					<option>Среднее-профессиональное</option>
					<option>Среднее-специальное</option>
					<option>Студент(ка) ВУЗа</option>
					<option>Неоконченное высшее</option>
					<option selected="">Высшее</option>
					</select>
				</td>
			<td></td>
			</tr>
		<!-- <tr>
			<td>Учебное заведение</td>
			<td> <input id="anketa_obr_2" type="text"> </td>
			<td></td>
			</tr> 
			
		<tr>
			<td>Год окончания</td>
			<td> <input id="anketa_obr_3" type="text"> </td>
			<td></td>
			</tr>
			
			-->
		<tr>
			<td>Специальность</td>
			<td> <input id="anketa_obr_3" type="text"> </td>
			<td></td>
			</tr>

			
		
			
		<tr><td colspan="3"> <br><br> <h2>Опыт работы</h2> <br> </td></tr>
		<tr>
			<td>Организация</td>
			<td> <input id="anketa_exp_1" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>Должность</td>
			<td> <input id="anketa_exp_2" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>Обязанности</td>
			<td> <input id="anketa_exp_3" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>Период (с/по)</td>
			<td> <input id="anketa_exp_4" type="text"> </td>
			<td></td>
			</tr>
		<tr>
			<td>  Если вы хотите добавить что-либо к вышеизложенному, сделайте это:</td>
			<td> <br><br> <textarea id="anketa_personal" style="height: 60px;"></textarea> </td>
			<td></td>
			</tr>
		<tr>
			<td style="width: 300px;">Откуда Вы узнали о вакансии:</td>
			<td> 
			<select id="anketa_ref_1">
					<option>Сайт компании</option>
					<option>Наружная реклама (баннеры и т.д.)</option>
					<option>HeadHunter.ru</option>
					<option>SuperJob.ru</option>
					<option>Rabota.ru</option>
					<option>Job.ru</option>
					<option>газета "Студент и работа"</option>
					<option>Другое</option>
					</select> 
				</td>
			<td></td>
			</tr>
			
		<tr>
			<td><input id="anketa_chbx" type="checkbox"></td>
			<td style="font-size: 10px;"><br> 
			
				Добровольно участвуя в конкурсном подборе, даю свое согласие на осуществление ООО «НевАльянс» обработки
				(сбор, систематизацию, накопление, хранение, уточнение (обновление, изменение), использование, сортировку, распространение 
				(в том числе передачу, включая трансграничную), обезличивание, блокирование, 
				уничтожение своих персональных данных, указанных в настоящей анкете в целях трудоустройства.
				Настоящее согласие дано на срок 5 лет и может быть отозвано КЛИЕНТОМ путем направления в адрес ИСПОЛНИТЕЛЯ письменного заявления.
				</td>
			</tr>
			
		<tr><td colspan="3">
			<p></p><div id="alert_div" style="background-color: #FF483B; border: 4px solid red; color: white; padding: 6px; display: none; margin-bottom: 10px;"></div>
			</td></tr>
			
		<tr>
			<td colspan="2" style="padding-top: 30px; text-align: center;">
				<a href="#" class="nl" onclick="gather_data(); return false;" style="display: inline; text-align: center;"> 
					<div class="anketa_but" style="display: inline; padding: 8px;">
						Отправить анкету
						</div>
					</a>
				</td>
			
			<td></td>
			</tr>
		</tbody></table>
	</div>
</div>