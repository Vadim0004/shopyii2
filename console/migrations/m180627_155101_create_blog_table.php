<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog`.
 */
class m180627_155101_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createBlog();
    }
    
    private function createBlog()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('blog', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'date' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()')),
            'short_content' => $this->text(),
            'content' => $this->text()->notNull(),
        ], $tableOptions);
        
        $this->insert('blog', [
            'id' => 1,
            'title' => 'В Гарварде создали самого быстрого в мире миниатюрного робота',
            'short_content' => 'Роботы бывают разные. Чаще всего, услышав слово «робот», мы представляем себе антропоморфное механическое существо, напоминающее последние разработки знаменитой компании Boston Dynamics. Но понятие данное куда шире. Исследователи из Гарвардского университета создали крошечного робота milliDelta, который не может похвастать тем, что похож на человека, зато на сегодняшний день он наверняка является самым быстрым и точным в своём классе.',
            'content' => 'Робот milliDelta способен двигаться с невероятной скоростью — до 75 движений в секунду. Если снимать его движения на видеокамеру, он превращается в расплывчатое пятно. Разработчики из Гарварда видят огромное количество применений для своего детища. В будущем он может стать частью сборочных конвейеров, где сможет очень быстро создавать печатные платы, или же стать частью сверхточного медицинского оборудования и помогать врачам в сфере микрохирургии. milliDelta относится к категории так называемых «дельта-роботов». Этот дизайн был разработан ещё в 80-е годы прошлого века и чаще всего использовался на различных фабриках и производствах. Подобные роботы устанавливались на конвейерах и занимались установкой различных деталей на их места в общей конструкции или просто перекладыванием/сортировкой предметов. Самый первый дельта-робот был использован в 1985 году на кондитерской фабрике и занимался тем, что раскладывал пралине (десерт из молотого миндаля, обжаренного в сахаре) по упаковкам. Ниже вы можете увидеть ролик, демонстрирующий подобных роботов на производстве.',
        ]);
        
        $this->insert('blog', [
            'id' => 2,
            'title' => 'Чтобы заразить кого-то гриппом, вам даже не нужно чихать и кашлять',
            'short_content' => 'Все мы знаем, что вирус гриппа распространяется воздушно-капельным путем. Это может быть напрямую, когда больной человек кашлянул или чихнул, а стоящий рядом здоровый человек вдохнул содержащий вирус воздух; посредством аэрозоля или капель, образующихся при чихании и кашле и содержащих вибрионы (частицы вируса); либо за счет прямого контакта с выделениями больного. Тем не менее ученые до сих пор не знают, каким именно способом распространяется грипп.',
            'content' => 'С декабря 2012 по март 2013 года медики и биологи провели наблюдение за 355 добровольцами, студентами возрастом от 19 до 22 лет, обладавшими симптомами ОРВИ. У 142 из них обнаружили грипп, а остальные (здоровые) не принимали участия в экспериментах. Каждый участник эксперимента проходил процедуру забора проб из носоглотки. На четвертый день после проявления симптомов болезни у людей брали пробы выдыхаемого воздуха. Человека просили в течение 30 минут дышать в специальный прибор, собирающий аэрозоли. За эти полчаса внутри прибора собирались крупные (диаметром больше 5 микрометров) и мелкие (меньше 5 микрометров, но больше 50 нанометров) капельки выдыхаемого аэрозоля. В итоге ученые собрали в общей сложности 218 проб из носоглотки, а также проб дыхания. Затем ученые провели анализ проб и разных фракций аэрозоля на наличие вирусной РНК. Кроме того, для проверки жизнеспособных вирусов в выделениях больных авторы работы выращивали вирусные культуры на модельных клетках собачьих почек. На поверку оказалось, что вирусная РНК содержалась в 97 процентах проб из верхних дыхательных путей, в 76 процентах – из «тонкой» фракции аэрозоля (с мелкими капельками) и в 40 процентах проб в «грубой» фракции. Жизнеспособные вирусы обнаружились в 89 процентах проб из носоглотки и 39 процентах проб с мелкими каплями аэрозоля. В своей статье исследователи отмечают, что вибрионы были обнаружены в половине проб дыхания людей, которые не кашляли и не чихали во время эксперимента. Из этого можно сделать вывод, что капли при выдыхании образовались не в результате чихания или кашля, а с помощью другого механизма. Авторы работы предположили, что крошечные капли образуются в легких при расширении и сужении бронхиол и с выдохом выходят наружу.',
        ]);
        
        $this->insert('blog', [
            'id' => 3,
            'title' => 'Honda выпустит электроскутер со сменными аккумуляторами',
            'short_content' => 'Скутеры PCX — очень популярное средство передвижения в Японии, поэтому их продолжают продавать большими партиями. Чтобы сократить выброс выхлопных газов, в Honda решили доработать скутеры, выпустив гибридную и электрическую версию этой модели со сменными аккумуляторами. Испытать новинки можно будет на мероприятии, которое скоро пройдёт в японском городе Сайтама. Там же компания представит и протестирует два автономных авто, созданных для доставки товаров.',
            'content' => 'Скутеры PCX — очень популярное средство передвижения в Японии, поэтому их продолжают продавать большими партиями. Чтобы сократить выброс выхлопных газов, в Honda решили доработать скутеры, выпустив гибридную и электрическую версию этой модели со сменными аккумуляторами. Испытать новинки можно будет на мероприятии, которое скоро пройдёт в японском городе Сайтама. Там же компания представит и протестирует два автономных авто, созданных для доставки товаров.От обычных PCX их экологичные версии отличаются синими вкраплениями на корпусе и возможностью использовать сменные батареи. Такое решение позволит владельцам не ограничивать себя запасом хода от батареи, при необходимости просто сменив аккумулятор. Полностью электрический скутер и модель с гибридной установкой ещё не пошли в серию. Пока Honda планирует провести несколько презентаций, чтобы понять, интересуют ли новые модели потенциальных владельцев. Пока же настораживает один момент: разработчики не сообщают никаких подробностей о силовой установке и ёмкости аккумуляторов. Возможно, их объём не так велик, как хотелось бы.',
        ]);
        
        $this->insert('blog', [
            'id' => 4,
            'title' => 'NASA финансирует создание блокчейн-сервиса для космических исследований',
            'short_content' => 'Специалисты Акронского университета из США исследуют возможность создания блокчейн-сервиса, который будет просчитывать траектории спутников, позволяя им избегать столкновения с космическим мусором. Для проведения дальнейших работ в этой области, NASA выделило разработчикам грант на 330 миллионов долларов.',
            'content' => 'Специалисты Акронского университета из США исследуют возможность создания блокчейн-сервиса, который будет просчитывать траектории спутников, позволяя им избегать столкновения с космическим мусором. Для проведения дальнейших работ в этой области, NASA выделило разработчикам грант на 330 миллионов долларов. Университетские специалисты, команду которых возглавляет профессор Джин Вэйем, собирается построить собственный дата-центр на блокчейне Эфира. Разработчики уверены, что их сервис поможет человечеству безопаснее и эффективнее исследовать космос, ведь несмотря на все успехи людей в этом отношении, ситуацию с космическим сбором данных трудно назвать идеальной. Исследовательские спутники находятся на разных орбитах, управлять ими из-за большого расстояния довольно сложно, да и вероятность столкновения с другими космическими объектами (например, мусором) довольно высока. Поэтому разработчики собираются управлять спутниками с помощью специально разработанного для этих целей ИИ и технологии распределённого реестра. Учёные уверены, что такой способ будет гораздо эффективнее, чем те, что существуют на данный момент.',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog');
    }
    
}
