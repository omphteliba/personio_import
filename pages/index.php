<h1>Personio Import Plugin </h1>
<?php
$func = rex_request('func', 'string');

if ($func == 'import') {
	if(personio::import()) {
		print rex_view::success(rex_i18n::msg('d2u_jobs_personio_import_success'));
	}
}

if(rex_config::get('d2u_jobs', 'personio_xml_url') != '') {
	print "<a href='". rex_url::currentBackendPage(['func'=>'import']) ."'>"
			. "<button class='btn btn-apply'>". rex_i18n::msg('d2u_jobs_personio_import') ."</button></a>";
}
?>

<h2>XML Format</h2>
<p>Personio stellt ein für den Kunden angepasstes XML bereit, das durch dieses
	Plugin importiert werden kann. Da sich das XML bei jedem Kunden unterscheiden
	kann, nachfolgend die Vorlage für eine XML Datei, die dieses Plugin importieren
	kann.</p>
<textarea style="width: 100%" rows="20">
<workzag-jobs>
    <position>
        <id>4103</id>
        <office>Munich</office>
        <department>Management</department>
        <recruitingCategory>Various</recruitingCategory>
        <name>Office- und Feelgood Manager (m/w)</name>
        <jobDescriptions>
            <jobDescription>
                <name>Beschreibung</name>
                <value>
                    <![CDATA[
                    Für unser Büro mitten im Münchner Glockenbachviertel suchen wir zum nächstmöglichen Zeitpunkt einen Office Manager (m/w) in Teilzeit, der/ die sich um alle Themen rund ums Office zuverlässig kümmert.<br><br><strong>Deine Aufgaben:</strong><br><br><ul><li>Ansprechpartner in Sachen Büro, Ausstattung und anderer “Wohlfühl”-Themen, die unseren Mitarbeiter/innen auf dem Herzen liegen</li><li>Bearbeitung von generellen Anfragen, Post und Eingangsrechnungen</li><li>Kommunikation und Organisation unserer Servicedienstleister und Zulieferer</li><li>Selbstständige Entwicklung &amp; Umsetzung neuer Ideen, Aktionen und Events für unsere Mitarbeiter</li><li>Unterstützung unseres Management-Teams bei organisatorischen Aufgaben</li><li>Management unserer <strong><a href="http://www.unumotors.com">Unu-Elektroroller</a></strong>-Flotte (ja, du bekommst auch einen, wenn du möchtest)</li></ul>
                    ]]>
                </value>
            </jobDescription>
            <jobDescription>
                <name>Dein Profil</name>
                <value>
                    <![CDATA[
                    <ul><li>Du bist herzlich, offen und kommunikativ</li><li>Du bist ein Organisationstalent und magst den Umgang mit Zahlen</li><li>Du bist gewissenhaft, sorgfältig und strukturiert</li><li>Du zeigst Eigeninitiative und Kreativität bei der Planung neuer Aktionen</li><li>Du sprichst Deutsch auf muttersprachlichem Niveau und hast gute Englischkenntnisse</li><li>Du hast Spaß an vielfältigen Aufgaben und unterstützt gerne dort, wo Hilfe gebraucht wird</li></ul>
                    ]]>
                </value>
            </jobDescription>
            <jobDescription>
                <name>Warum Personio</name>
                <value>
                    <![CDATA[
                    <ul><li>Chance in einem schnell wachsenden Unternehmen an vielfältigen Aufgaben zu wachsen und zu lernen</li><li>Kreatives Arbeitsumfeld und kurze Entscheidungswege</li><li>Von Anfang an volle Verantwortung in Deinem Bereich</li><li>Regelmäßige Team-Events, Tischtennis und Ausflüge ins Münchner Nachtleben</li><li>Büro im Herzen von München (nahe Gärtnerplatz)</li><li>Blitzschneller Elektroroller deiner Wahl als “Geschäftswagen”</li></ul>
                    ]]>
                </value>
            </jobDescription>
        </jobDescriptions>
        <employmentType>permanent</employmentType>
        <seniority>entry-level</seniority>
        <schedule>full-time</schedule>
        <yearsOfExperience>lt-1</yearsOfExperience>
        <keywords>
            office manager,project management,büro,assistenz,organisation,part time,Teilzeit
        </keywords>
        <occupation>office_management</occupation>
        <occupationCategory>administrative_and_clerical</occupationCategory>
        <createdAt>2016-05-31T12:14:07+0200</createdAt>
    </position>
</workzag-jobs>
</textarea>
<h2>Automatischer Import</h2>
<p>Um einen automatischen Import zu installieren muss im Addon Cronjobs ein neuer
	Cronjob hinzugefügt werden. Als Typ wird URL Aufruf ausgewählt. Die URL ist
	die Sync URL das personio Plugins.</p>
<h2>Bug reporting</h2>
<p>Fehler bitte auf <a href="https://github.com/omphteliba/d2u_jobs_personio/issues" target="_blank">GitHub</a> melden.</p>
<h2>Changelog</h2>
<p>1.0.0:</p>
<ul>
	<li>Initiale Version.</li>
</ul>
