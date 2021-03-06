<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$lf = 'LLL:EXT:contexts/Resources/Private/Language/locallang_db.xml';

$TCA['tx_contexts_contexts'] = array(
    'ctrl' => $TCA['tx_contexts_contexts']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'title,alias,type,invert,use_session,disabled'
    ),
    'feInterface' => $TCA['tx_contexts_contexts']['feInterface'],
    'columns' => array(
        'title' => array(
            'exclude' => 0,
            'label' => $lf . ':tx_contexts_contexts.title',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'required',
            )
        ),
        'disabled' => array(
            'exclude' => 0,
            'label' => $lf . ':tx_contexts_contexts.disable',
            'config' => array(
                'type' => 'check',
            )
        ),
        'alias' => array(
            'exclude' => 0,
            'label' => $lf . ':tx_contexts_contexts.alias',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'alphanum,nospace,unique',
            )
        ),
        'type' => array(
            'exclude' => 0,
            'label' => $lf . ':tx_contexts_contexts.type',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array($lf . ':tx_contexts_contexts.type.select_type', '')
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'type_conf' => array(
            'exclude' => 0,
            'displayCond' => 'FIELD:type:REQ:true',
            'label' => $lf . ':tx_contexts_contexts.type_conf',
            'config' => array(
                'type' => 'flex',
                'ds_pointerField' => 'type',
                'ds' => array()
            )
        ),
        'invert' => array(
            'exclude' => 0,
            'label'   => $lf . ':tx_contexts_contexts.invert',
            'config'  => array(
                'type'    => 'check',
                'default' => 0
            )
        ),
        'use_session' => array(
            'exclude' => 0,
            'label'   => $lf . ':tx_contexts_contexts.use_session',
            'config'  => array(
                'type'    => 'check',
                'default' => 1
            )
        ),
        'default_settings' => array(
            'config' => array(
                'type' => 'passthrough'
            )
        )
    ),
    'types' => array(
        '0' => array(
            'showitem'
                => '--div--;'
                . $lf
                . ':tx_contexts_contexts.general,title;;;;2-2-2, '
                . 'disabled;;;;2-2-2,alias;;;;3-3-3,type,type_conf,invert,'
                . 'use_session, '
                . '--div--;'
                . $lf
                . ':tx_contexts_contexts.defaults'
        )
    ),
    'palettes' => array(
        '1' => array('showitem' => '')
    )
);
?>
